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
use App\Exam;
use App\SubCat;
use App\College;
use App\State;
use App\Book;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nameupdate = $this->SlugUpdate();'nameupdate'=>$nameupdate

        $title = 'Top Entrance Examination';
        $exams = SubCat::where('cat_id',2)->get();

        return view('frontviews.exams.index', ['title'=>$title, 'exams'=>$exams]);
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

        $examcat = SubCat::where('slug',$slug)->first();
        $examlists = Exam::where('subcat_id',$examcat->id)->get();
        $exams = SubCat::where('cat_id',2)->get();
        return view('frontviews.exams.show', ['examlists'=>$examlists, 'exams'=>$exams, 'examcat'=>$examcat]);
        //return Response::json($examlists);
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function syllabus()
    {
        return view('frontviews.exams.syllabus');
    }

    public function SlugUpdate()
    {

      $examname = Exam::all();
      foreach($examname as $name){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(Exam::class, 'slug', $name->name);
      $name->slug = $slug;
      $name->save();
      }


      return 'slug updates' ;

    }

    public function getExamDetails($slug)
    {

       $examdet = Exam::where('slug', $slug)->first();
       $subcat = SubCat::where('id', $examdet->subcat_id)->select('title','slug','id')->get();
       //return Response::json($subcat);

       return view('frontviews.exams.examdetails', ['examdet'=>$examdet , 'subcat'=>$subcat ]);

    }

}
