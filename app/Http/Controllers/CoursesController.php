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
use App\Course;
use App\SubjectMapping;
use App\Subject;
use App\Syllabus;
use App\Examboard;
use App\SubCat;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;
// use Sluggable;

class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //$slugupdate = $this->SlugUpdate();, 'slugupdate'=>$slugupdate {!! $slugupdate !!}

      $coursecats = SubCat::where('cat_id',6)->get();

      $title = 'List of Courses offer by various university in India';
      $university = DB::table('universities')->select('university_name','id')->get();

      $courses = Course::paginate(5);

      return view('frontviews.courses.index', ['title'=>$title, 'university'=>$university,
      'courses'=>$courses, 'coursecats'=>$coursecats]);

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
        $subcat = SubCat::where('slug', $slug)->first();
        $courses = Course::where('subcat_id',$subcat->id)->get();
        // return Response::json($courses);
        // die();

        if ($courses) {
          return view('frontviews.courses.show', ['courses'=>$courses]);
        } else {
          return redirect('/')->withErrors('Requested Course not found');
        }


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

      $courses = Course::all();
      foreach($courses as $course){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(Course::class, 'slug', $course->name);
      $course->slug = $slug;
      $course->save();
      }


      return 'slug updates' ;

    }
}
