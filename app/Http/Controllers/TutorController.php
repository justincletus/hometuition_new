<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use Auth;
use App\Page;
use App\Contact;
use App\Files;
use App\Support;
use Session;
use Purifier;
use Image;

use Illuminate\Http\Response;
use App\Category;
use App\SubCat;
use App\SubSubCat;



class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $support = DB::table('supports')->get();

        $pages = DB::table('pages')->where('pagename','About Us')->first();
        // echo Response::json($support);
        return view('main', ['pages'=>$pages, 'support'=>$support] );
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
        //$slug = $slug;
        $subcat = SubCat::where('slug', $slug)->first();

        if ($subcat){
            $programs = SubSubCat::where('subcat_id', $subcat->id)->get();
            return view('frontviews.notes.index', ['programs'=>$programs]);
        }

        return view('frontviews.pages.contactus');
//        return new Response('No subject details found');




        //return Response::json($subsubcat);


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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacts(Request $request)
    {


        $rand = $this->generate_serial_number();
        $cont = new Contact();
        $cont->firstname = $request->firstname;
        $cont->lastname = $request->lastname;
        $cont->email = $request->email;
        $cont->phone = $request->phone;
        $cont->message = $request->message;
        $cont->tnumber = $rand;
        $cont->save();
        Session::flash('message', 'Contact information is saved');
        return redirect()->back()->with('rand',$rand);

        // print_r($cont);
        // die();

        //return '<h3>this is feedback form submit..</h3>' .$rand;
    }

    public function generatenum($prefix='',$post_fix='')
    {
        $t=time();
        return (rand(000,111).$prefix.$t.$post_fix);
    }

    function generate_serial_number() {

       $Allowed_Charaters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       return substr(str_shuffle($Allowed_Charaters), 0, 8);

    }




}
