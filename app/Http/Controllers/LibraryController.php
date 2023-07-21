<?php

namespace App\Http\Controllers;

use App\Models\library;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class LibraryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Library::orderBy('created_at' , 'DESC')->get();
        return view('books.index')->with('books',$books);
    }

    public function booksTrashed()
    {
        $books = Library::onlyTrashed()->where('user_id', Auth::id())->get();
        return view('books.trashed')->with('books',$books);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'book_code' => 'required',
                'type' => 'required',
                'description' => 'required',
                'author' => 'required',
                'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/books/',$newPhoto);

        $book = Library::create([
            'user_id' =>  Auth::id(),
            'name' =>  $request->name,
            'book_code' =>   $request->book_code,
            'type' =>  $request->type,
            'description' =>  $request->description,
            'author' =>   $request->author,
            'photo' =>  'uploads/books/'.$newPhoto,
            'slug' =>   str_slug($request->name),
        ]);

        return redirect()->back() ;

    }



    public function show($id)
    {
        $book = Library::findOrFail($id);
        return view('books.show', compact('book'));
    }


    public function edit($id)
    {
        $book = Library::where('id' , $id )->where('user_id', Auth::id())->first();
         if ($book === null) {
            return redirect()->back() ;
        }
        return view('books.edit')->with('book',$book);
    }

    public function update(Request $request, $id)
    {
        $book = Library::find( $id ) ;
        $this->validate($request,[
            'name' => 'required',
            'book_code' => 'required',
            'type' => 'required',
            'description' => 'required',
            'author' => 'required',
        ]);

    if ($request->has('photo')) {
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/books',$newPhoto);
        $book->photo ='uploads/books/'.$newPhoto ;
    }

    $book->name = $request->name;
    $book->book_code = $request->book_code;
    $book->type = $request->type;
    $book->description = $request->description;
    $book->author = $request->author;
    $book->save();
    return redirect()->back() ;
    }

    public function destroy($id)
    {
        $book = Library::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($book === null) {
           return redirect()->back() ;
       }

        $book->delete($id);
        return redirect()->back() ;
    }

    public function hdelete( $id)
    {
        $book = Library::withTrashed()->where('id' ,  $id )->first() ;
        $book->forceDelete();
        return redirect()->back() ;
    }

    public function restore( $id)
    {
        $book = Library::withTrashed()->where('id' ,  $id )->first() ;
        $book->restore();
        return redirect()->back() ;
    }
}
