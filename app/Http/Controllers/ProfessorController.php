<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Profile;

class ProfessorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $professors = Professor::orderBy('created_at' , 'DESC')->get();
        return view('professors.index')->with('professors',$professors);
    }

    public function professorsTrashed()
    {
        $professors = Professor::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('professors.trashed')->with('professors',$professors);
    }

    public function create()
    {
        return view('professors.create');
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
                'experience' => 'required',
                'LinkedIn' => 'required',
                'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/professors/',$newPhoto);

        $professor = Professor::create([
            'user_id' =>  Auth::id(),
            'name' =>  $request->name,
            'id_card' =>   $request->id_card,
            'gender' =>  $request->gender,
            'country' =>   $request->country,
            'city' =>  $request->city,
            'date_of_birth' =>   $request->date_of_birth,
            'phone_number' =>  $request->phone_number,
            'email_address' =>   $request->email_address,
            'experience' =>  $request->experience,
            'LinkedIn' =>   $request->LinkedIn,
            'photo' =>  'uploads/professors/'.$newPhoto,
            'slug' =>   str_slug($request->name),
        ]);

        return redirect()->back() ;

    }

   public function show($slug)
    {
        /*$professor = Professor::where('id' , $id )->first();
        $courses = $professor->courses;
        return view('professors.show', compact('professor', 'courses'));*/

         $courses = Course::all();
        $professor = Professor::where('slug' , $slug )->first();
        return view('professors.show')->with('professor',$professor)->with('courses',$courses);

   /* return view('professors.show')->with('professor',$professor)->with('courses',$courses);*/
   }

    public function edit($id)
    {
        $professor = Professor::where('id' , $id )->where('user_id', Auth::id())->first();
         if ($professor === null) {
            return redirect()->back() ;
        }
        return view('professors.edit')->with('professor',$professor);
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::find( $id ) ;
        $this->validate($request,[
                'name' => 'required',
                'id_card' => 'required',
                'gender' => 'required',
                'country' => 'required',
                'city' => 'required',
                'date_of_birth' => 'required',
                'phone_number' => 'required',
                'email_address' => 'required',
                'experience' => 'required',
                'LinkedIn' => 'required',
        ]);

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/professors',$newPhoto);
        $professor->photo ='uploads/professors/'.$newPhoto ;
    }

    $professor->name = $request->name;
    $professor->id_card = $request->id_card;
    $professor->gender = $request->gender;
    $professor->country = $request->country;
    $professor->city = $request->city;
    $professor->date_of_birth = $request->date_of_birth;
    $professor->phone_number = $request->phone_number;
    $professor->email_address = $request->email_address;
    $professor->experience = $request->experience;
    $professor->LinkedIn = $request->LinkedIn;
    $professor->save();
    return redirect()->back() ;
    }

    public function destroy($id)
    {
        $professor = Professor::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($professor === null) {
           return redirect()->back() ;
       }

        $professor->delete($id);
        return redirect()->back() ;
    }

    public function hdelete( $id)
    {
        $professor = Professor::withTrashed()->where('id' ,  $id )->first() ;
        $professor->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $professor = Professor::withTrashed()->where('id' ,  $id )->first() ;
        $professor->restore();
        return redirect()->back() ;
    }
}
