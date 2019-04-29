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
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;


class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$states = State::pluck('sname','id');
        //$coll = $this->SlugUpdate();// , '$coll'=>$coll   <p> {{ $coll }}</p>

        $title = 'List of Colleges in India';
        $states = \DB::table('states')->select('sname','id')->get();

        // $states = DB::table('states')->select('sname','id')->get();

        $colleges = College::paginate(5);

        return view('frontviews.colleges.index', ['colleges'=>$colleges, 'title'=>$title, 'states'=>$states]);
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
      $college = College::where('slug', $slug)->first();
      return view('frontviews.colleges.show', ['college'=>$college]);
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
    public function getState()
    {
      $title = 'state page';
      return $title;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCity(Request $request)
    {
      // $cities = DB::table('cities')->where('state_id',$request->state_id)->lists('cname','id');
      $cities = DB::table('cities')->where('state_id', $request->state_id)->get();

      return Response::json($cities);
      die();
      // return response()->json($cities);
      //return 'city page';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUniversity(Request $request)
    {
      return 'university page';
    }

    public function SlugUpdate()
    {

      $colleges = College::all();
      foreach($colleges as $college){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(College::class, 'slug', $college->name);
      $college->slug = $slug;
      $college->save();
      }


      return 'slug updates' ;

    }


}
