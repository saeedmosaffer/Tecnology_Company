<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Professor;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::orderBy('created_at' , 'DESC')->get();
        return view('students.index')->with('students',$students);
    }

    public function studentsTrashed()
    {
        $students = Student::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('students.trashed')->with('students',$students);
    }

    public function create()
    {
        $courses = Course::all();
        return view('students.create')->with('courses', $courses);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'id_card' => 'required',
                'gender' => 'required',
                'country' => 'required',
                'city' => 'required',
                'date_of_birth' => 'required',
                'phone_number' => 'required',
                'email_address' => 'required',
                'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/students/',$newPhoto);

        $student = Student::create([
            'user_id' =>  Auth::id(),
            'name' =>  $request->name,
            'id_card' =>   $request->id_card,
            'gender' =>  $request->gender,
            'country' =>   $request->country,
            'city' =>  $request->city,
            'date_of_birth' =>   $request->date_of_birth,
            'phone_number' =>  $request->phone_number,
            'email_address' =>   $request->email_address,
            'photo' =>  'uploads/students/'.$newPhoto,
            'slug' =>   str_slug($request->name),
            'supervising_professor_id' => Professor::inRandomOrder()->first()->id,

        ]);


        $student->courses()->attach($request->courses);

        return redirect()->back() ;

    }

    public function show($id)
    {
        $student = Student::where('id' , $id )->first();
        $courses = $student->courses;
        return view('students.show', compact('student', 'courses'));
    }

   /* public function buyBook($studentId, $LibraryId)
    {
        $student = Student::find($studentId);
        $book = Book::find($LibraryId);

        if ($book->available_copies > 0) {
            $cost = $book->price;

            $student->balance -= $cost;
            $student->save();

            $book->available_copies--;
            $book->save();

            $transaction = new Transaction;
            $transaction->student_id = $studentId;
            $transaction->book_id = $LibraryId;
            $transaction->cost = $cost;
            $transaction->save();

            return redirect()->back()->with('success', 'Book purchased successfully!');
        } else {
            return redirect()->back()->with('error', 'Book is not available for purchase.');
        }
    }*/


    public function edit($id)
    {
        $courses = Course::all();
        $student = Student::where('id' , $id )->where('user_id', Auth::id())->first();
         if ($student === null) {
            return redirect()->back() ;
        }
        return view('students.edit')->with('student',$student)->with('courses', $courses);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find( $id ) ;
        $this->validate($request,[
                'name' => 'required',
                'id_card' => 'required',
                'gender' => 'required',
                'country' => 'required',
                'city' => 'required',
                'date_of_birth' => 'required',
                'phone_number' => 'required',
                'email_address' => 'required',
        ]);

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/students',$newPhoto);
        $student->photo ='uploads/students/'.$newPhoto ;
    }



    $student->name = $request->name;
    $student->id_card = $request->id_card;
    $student->gender = $request->gender;
    $student->country = $request->country;
    $student->city = $request->city;
    $student->date_of_birth = $request->date_of_birth;
    $student->phone_number = $request->phone_number;
    $student->email_address = $request->email_address;
    $student->save();
    $student->courses()->sync($request->courses);
    return redirect()->back() ;
    }

    public function destroy($id)
    {
        $student = Student::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($student === null) {
           return redirect()->back() ;
       }

        $student->delete($id);
        return redirect()->back() ;
    }

    public function hdelete( $id)
    {
        $student = Student::withTrashed()->where('id' ,  $id )->first() ;
        $student->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $student = Student::withTrashed()->where('id' ,  $id )->first() ;
        $student->restore();
        return redirect()->back() ;
    }
}
