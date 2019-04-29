<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
// use Revolution\Google\Sheets\Sheets;
use App\SubCat;
use App\Http\Requests;
use Auth;
use App\Book;
use App\Files;
use Session;
use Purifier;
use Image;
use Validator;
use Response;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = SubCat::orderBy('id')->where('cat_id',13)->get();

        $services = SubCat::orderBy('id')->where('cat_id',1)->get();
        $exams = SubCat::orderBy('id')->where('cat_id',2)->get();
        $courses = SubCat::orderBy('id')->where('cat_id',6)->get();
        $admissions = SubCat::orderBy('id')->where('cat_id',7)->get();
        $bookcats = SubCat::orderBy('id')->where('cat_id',4)->get();


        $books = DB::table('books')->paginate(5);
        $title = 'Online Library';
        return  view('frontviews.library.index' , ['books'=>$books,
        'title'=>$title, 'bookcats'=>$bookcats, 'exams'=>$exams, 'courses'=>$courses,
        'admissions'=>$admissions, 'services'=>$services, 'notes'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = DB::table('books')->find($id);
        $title = $book->title;
        return view('frontviews.library.show', ['book' => $book, 'title'=>$title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
