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
use App\University;
use App\State;
use App\City;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List of University in India';
        //$uni = $this->SlugUpdate();, 'uni'=>$uni   <p> {{ $uni }}</p>
        $universities = University::paginate(5);


        $states = \DB::table('states')->select('sname','id')->get();
        return view('frontviews.university.index', ['title'=>$title, 'states'=>$states , 'universities' => $universities]);

    }

    public function getcity($sta_id){
    //$cities = City::where("state_id", $sta_id)->select('cname', 'id');
    $cities = City::where("state_id", $sta_id)->pluck('cname', 'id');
    return response()->json(['success' => true, 'cities' => $cities]);
  }

  public function getuniversity($cityID){
  //$cities = City::where("state_id", $sta_id)->select('cname', 'id');
  $universities = University::where("city_id", $cityID)->pluck('university_name', 'id');
  return response()->json(['success' => true, 'universities' => $universities]);

  }

  public function getcolleges($uniID){
  //$cities = City::where("state_id", $sta_id)->select('cname', 'id');
  // $universities = University::where("city_id", $cityID)->pluck('university_name', 'id');
  // return response()->json(['success' => true, 'universities' => $universities]);
  $uni = University::find($uniID);
  $name = $uni->university_name;
  $title = 'List of Colleges Under the university ' .$name;
  return response()->json(['success' => true, 'title' => $title]);
  //return view('frontviews.university.collegelist', ['title'=>$title]);

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
        $university = University::where('slug',$slug)->first();
        return view('frontviews.university.show', ['university' => $university]);
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

      $universities = University::all();
      foreach($universities as $university){
      // $field = $course->name;
      // $field = $course->sluggable();
      $slug = SlugService::createSlug(University::class, 'slug', $university->university_name);
      $university->slug = $slug;
      $university->save();
      }


      return 'slug updates' ;

    }
}
