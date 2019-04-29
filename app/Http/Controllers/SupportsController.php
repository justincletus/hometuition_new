<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Category;
use App\SubCat;
use App\Http\Requests;
use Auth;
use App\Support;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;

class SupportsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$supdet = $this->SlugUpdate();
        $cats = Category::all();

        $title = 'list of online services';
        return view('frontviews.supports.index', ['title'=>$title ,'cats'=>$cats]);
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

        $cats = Category::all();
        $support = Support::where('slug', $slug)->first();
        return view('frontviews.supports.show', ['support'=>$support, 'cats'=>$cats]);

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

    public function findBySlug($slug){

    $support = Support::whereSlug($slug)->firstOrFail();

    }

    public function anyMyRoute(Request $request) {
    $host = $request->getHttpHost(); // returns dev.site.com
    }

    public function SlugUpdate()
    {

      $sups = Support::all();
      foreach($sups as $sup){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(Support::class, 'slug', $sup->name);
      $sup->slug = $slug;
      $sup->save();
      }


      return 'slug updates' ;

    }



}
