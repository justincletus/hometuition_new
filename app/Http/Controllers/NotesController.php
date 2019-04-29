<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests;
use Auth;
use App\Page;
use App\Contact;
use App\Files;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;
use App\Category;
use App\SubCat;
use App\SubSubCat;
use App\Exam;
use Route;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $program = SubSubCat::where('slug',$slug)->first();

        $prog_lang = SubCat::where('id',$program->subcat_id)->get();

        $contents = Page::where('subsubcat_id', $program->id)->get();

        return view('frontviews.notes.show', ['contents'=>$contents,
                    'program'=>$program, 'prog_lang'=>$prog_lang]);

        //return Response::json($contents);

    }

    public function getPrograms($slug)
    {

      $page = Page::where('slug',$slug)->first();

      $subsubcatname = SubSubCat::where('id',$page->subsubcat_id)->first();

      $pages = Page::where('subsubcat_id', $page->subsubcat_id)->get();

      $previous = DB::table('pages')->where('subsubcat_id', '=', $page->subsubcat_id)->where('id', '<', $page->id)->max('id');
      //
      $next     = DB::table('pages')->where('subsubcat_id', '=', $page->subsubcat_id)->where('id', '>', $page->id)->min('id');

      $title = ' : ' .$page->pagename;

      $prevslug = Page::where('id',$previous)->first();
      $nextslug = Page::where('id',$next)->first();

      //return $next;

      // $previous =


      return view('frontviews.notes.pagepreview', ['page'=>$page, 'pages'=>$pages,
                                                  'subsubcatname'=>$subsubcatname,
                                                'title'=>$title,
                                                'prevslug'=>$prevslug,
                                                'nextslug'=>$nextslug]);


      // return 'abcd';
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
