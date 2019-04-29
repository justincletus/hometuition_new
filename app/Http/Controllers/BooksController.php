<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests;
use Auth;
use App\College;
use App\State;
use App\Book;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$boo = $this->SlugUpdate(); // 'boo'=>$boo <p> {{ $boo }}</p>
        $title = 'List of Available Books';
        $books = Book::paginate(5);
        return view('frontviews.books.index', ['title'=>$title, 'books'=>$books]);
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
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();
        return view('frontviews.books.show', ['book'=>$book]);
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

    public function SlugUpdate()
    {

      $books = Book::all();
      foreach($books as $book){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(Book::class, 'slug', $book->title);
      $book->slug = $slug;
      $book->save();
      }


      return 'slug updates' ;

    }
}
