<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use Auth;
use App\School;
use App\SubjectMapping;
use App\Subject;
use App\Syllabus;
use App\Examboard;
use App\Standard;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title= 'List of Schools in Mumbai';
        $schools = DB::table('schools')->paginate(5);
        return view('frontviews.schools.index', ['schools'=>$schools, 'title'=>$title]);
    }

    public function schoolname($name)
    {
      //$cities = City::where("state_id", $sta_id)->pluck('cname', 'id');


      $schoolname = School::where('name', 'LIKE', '%' . $name . '%')->get();

      return response()->json(['success' => true, 'schoolname' => $schoolname]);
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
        //
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
      //$examboards  = Examboard::all();
      $examboards = \DB::table('examboards')->select('type','id')->get();
      // return Response::json($examboard);
      // die();
      $title = 'Select Syllabus by Subject';
      return view('frontviews.schools.syllabus', ['title' =>$title , 'examboards'=>$examboards]);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getstandard($exam)
    {
      $stds = Standard::where('examboard_id',$exam)->pluck('std','id');
      //$cities = City::where("state_id", $sta_id)->pluck('cname', 'id');
      return response()->json(['success' => true, 'stds' => $stds]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsubject($std,$exam)
    {
      $subs = DB::table('subjects')->leftJoin('subject_mappings', 'subjects.id', '=', 'subject_mappings.sub_id')
      ->where('subject_mappings.examboard_type', $exam)->where('subject_mappings.std_id',$std)->get();

      if($subs != NULL){
        // foreach ($subs as $key => $value) {
        //   $name = $value->name;
        //   return response()->json(['success' => true, 'subs' => $name]);
        // }
        return response()->json(['success' => true, 'subs' => $subs]);
      }
      else {
        return response()->json(['failed' => false, 'subs' => 'no data']);
      }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getsyllabus($exam,$std,$subid)
    {

      $syll = DB::table('subject_mappings')
                  ->leftJoin('subjects','subjects.id','=','subject_mappings.sub_id')
                  ->join('syllabi','syllabi.examboard_id','=','subject_mappings.examboard_type')
                  ->where('syllabi.std_id',$std)
                  ->where('subject_mappings.id',$subid)
                  ->where('subject_mappings.examboard_type',$exam)
                  ->get();

      if($syll != NULL){
        return response()->json(['success' => true, 'syll' => $syll]);
      }
      else {
        $syll = 'No Record Found';
        return response()->json(['success' => false, 'sylls' => $syll]);
      }

    }

    public function getSyllabusDetails()
    {
      return 'form submitted';

    }

}
