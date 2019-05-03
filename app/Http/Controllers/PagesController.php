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
use App\SubCat;
use App\Exam;



class PagesController extends Controller
{

  protected $validationRules=[
              'title' => 'required|max:255',
              'details' => 'required'
  ];

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageresult = Page::all();

        return view('admin.pages.index', ['pages'=>$pageresult]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $title = 'Create Page';
        $blog_cat = DB::table('sub_cats')
                    ->whereIn('cat_id', [10, 12,13])->select('title','id')
                    ->get();
        $subsubcat = DB::table('sub_sub_cats')
                    ->whereIn('subcat_id', [55])->select('title','id')
                    ->get();

        return view('admin.pages.create', ['title' => $title, 'blog_cat'=> $blog_cat, 'subsubcat'=>$subsubcat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message = Validator::make($request->all(), $this->validationRules);

      if ($message->fails())
      {
          return redirect()->back()->withErrors($message->errors());
      }

      $page = new Page();
      $page->pagename = $request->title;
      $page->details = $request->details;
      $page->subcat_id = $request->pagecat;
      $page->subsubcat_id = $request->pagesubcat;
      $page->uid = $request->uid;
      $page->save();

      return redirect()->route('pages.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug',$slug)->first();


        //return Response::json($page);
        return view('admin.pages.show', ['page'=>$page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit = Page::find($id);
        return view('admin.pages.edit', ['edit'=>$edit]);
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
      $updates = Page::where('id',$id)->first();
      $updates->pagename = $request->title;
      $updates->details = $request->details1;
      $updates->uid = $request->uid;

      // Response::json($updates);
      // die();
      $updates->save();
      return redirect()->route('pages.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Page::find($id);
        $del->delete();
        return redirect()->route('pages.index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ContactDetails()
    {
      $contacts = DB::table('contacts')->get();
      return view('admin.pages.contacts', ['contacts'=>$contacts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function files()
    {
      $title[] = $this->googleSheet();


      return view('admin.pages.files', ['title'=>$title] );
      // return 'file getpath';
    }
    public function googleSheet()
    {

      $spreadsheet = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vScS_FTzTEH5uJqc3L13Mnx5_CnmTCobFTFITpUwZqmgcUC5Yx9Fy2UmvnRalaiL5VDrVEV0kZe1yo2/pub?output=csv';
      $file = fopen($spreadsheet, "r");
      while (!feof($file)) {
        // code...
      $row[] = fgetcsv($file);

    }
    foreach ($row as $key => $value) {

      $result = new SubCat();
      $result->title = $value[0];
      $result->cat_id =$value[1];
      $result->save();

    }

    fclose($file);
    return $row[0];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filesstore(Request $request)
    {

    $id = $request->uid;

    $file = $request->file('fileupload');
    $filename = $file->getClientOriginalName();

    $name = Auth::user()->name;

    $destinationPath = public_path() .'/uploads/'.$name;
    $file->move($destinationPath, $file->getClientOriginalName());
    $filepath = $destinationPath .'/'.$filename;

    $filedetails = array();
    $filedetails['filename'] = $filename;
    $filedetails['filepath'] = $filepath;
    $filedetails['uid'] = $id;


    $dbobj = DB::insert("insert into files(filename,filepath,uid,created_at,updated_at) values('$filename','$filepath','$id',now(),now())");
    if(!$dbobj){
        Session::flash('message', 'file not inserted please try again later');
        return redirect()->back();
    }


    Session::flash('message', 'file uploaded success');

    return view('admin.pages.filestatus')->with('message','message');


    }


    public function filedetails()
    {
      $files = DB::table('files')->get();

      return view('admin.pages.filedetails',['files'=>$files]);
    }

    public function filetest()
    {
        $name = Auth::user()->name;

        if (file_exists( public_path() . '/uploads/' .$name .'/Services.csv')) {
          $path = public_path() . '/uploads/' .$name .'/Services.csv';
          $file = fopen($path, "r");
          $column[] = fgetcsv($file);
          //$ser = new Support();
          $b = array();
          while (!feof($file)) {
            // code...
          $row[] = fgetcsv($file);
        }
          foreach ($row as $key => $value) {

            $result = DB::insert("insert into supports(name,details,cat_id,uid, created_at, updated_at) values('$value[1]','$value[2]','$value[3]','$value[4]',now(),now())");

          }

        } else {
            return FALSE;
        }
        fclose($file);
        return TRUE;
    }

    public function collegescsv()
    {
        $name = Auth::user()->name;

        if (file_exists( public_path() . '/uploads/' .$name .'/colleges.csv')) {
          $path = public_path() . '/uploads/' .$name .'/colleges.csv';
          $file = fopen($path, "r");
          while (!feof($file)) {
            // code...
          $row[] = fgetcsv($file);
        }
          foreach ($row as $key => $value) {

            $result = DB::insert("insert into colleges(name, url, address, uid, created_at, updated_at) values('$value[0]','$value[1]','$value[2]','$value[3]',now(),now())");

          }


        } else {
            return FALSE;
        }
        fclose($file);
        return TRUE;
    }

    public function fileread()
    {

      $name = Auth::user()->name;
      $file_n = storage_path('uploads/' .$name .'/Services.csv');
      $file = fopen($file_n, "r");
      $all_data = array();
      while ( ($data = fgetcsv($file, 200, ",")) !==FALSE) {

         $id = $data[0];
         $title = $data[1];
         $details = $data[2];
         $cat_id = $data[3];
         $uid = $data[4];

         $all_data = $id. " ".$title ." ".$details . " " .$cat_id ." " .$uid ;

         array_push($array, $all_data);
      }

      fclose($file);

      return $all_data;

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function googleSheetView(Request $request)
    {
      $user = $request->user();

      $token = [
            'access_token'  => $user->access_token,
            'refresh_token' => $user->refresh_token,
            'expires_in'    => $user->expires_in,
            'created'       => $user->updated_at->getTimestamp(),
      ];

      // all() returns array
      $values = Sheets::setAccessToken($token)->spreadsheet('10d7Ou8xSUYw0PokNuWh_I-v-nOmbdbUlGyWqGCO1mio')->sheet('Sheet1')->all();

      return 'google sheet test';

      // return Json_encode($values);


    }

}
