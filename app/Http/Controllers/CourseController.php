<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::orderBy('created_at' , 'DESC')->get();
        return view('courses.index')->with('courses',$courses);
    }

    public function coursesTrashed()
    {
        $courses = Course::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('courses.trashed')->with('courses',$courses);
    }

    public function create()
    {
        $professors = Professor::all();
        if ($professors->count() == 0) {
            return redirect()->route('professor.create');
        }
        return view('courses.create')->with('professors', $professors);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'category' => 'required',
                'hours' => 'required',
                'price' => 'required',
                'description' => 'required',
                'prof_id' => 'required',
                'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/courses/',$newPhoto);

        $course = Course::create([
            'user_id' =>  Auth::id(),
            'name' =>  $request->name,
            'category' =>   $request->category,
            'hours' =>  $request->hours,
            'price' =>   $request->price,
            'description' =>  $request->description,
            'prof_id' =>   $request->prof_id,
            'photo' =>  'uploads/courses/'.$newPhoto,
            'slug' =>   str_slug($request->name),
        ]);

        return redirect()->back() ;

    }

    public function show( $slug)
    {
        $professors = Professor::all();
        $course = Course::where('slug' , $slug )->first();
        return view('courses.show')->with('course',$course)->with('professors',$professors);
    }

    public function edit($id)
    {
        $professors = Professor::all();
        $course = Course::where('id' , $id )->where('user_id', Auth::id())->first();
         if ($course === null) {
            return redirect()->back() ;
        }
        return view('courses.edit')->with('course',$course)->with('professors',$professors);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find( $id ) ;
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
            'hours' => 'required',
            'price' => 'required',
            'description' => 'required',
            'prof_id' => 'required',
        ]);

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/courses',$newPhoto);
        $course->photo ='uploads/courses/'.$newPhoto ;
    }

    $course->name = $request->name;
    $course->category = $request->category;
    $course->hours = $request->hours;
    $course->price = $request->price;
    $course->description = $request->description;
    $course->prof_id = $request->prof_id;
    $course->save();
    return redirect()->back() ;
    }

    public function destroy($id)
    {
        $course = Course::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($course === null) {
           return redirect()->back() ;
       }

        $course->delete($id);
        return redirect()->back() ;
    }

    public function hdelete( $id)
    {
        $course = Course::withTrashed()->where('id' ,  $id )->first() ;
        $course->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $course = Course::withTrashed()->where('id' ,  $id )->first() ;
        $course->restore();
        return redirect()->back() ;
    }
}
