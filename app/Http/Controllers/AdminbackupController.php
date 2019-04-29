<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use App\Page;
use App\Contact;
use App\Files;
use Session;
use Purifier;
use Image;

class AdminbackupController extends Controller
{

    public function admin()
    {
      if (Auth::user()) {   // Check is user logged in
            $admin = Auth::user()->isAdmin();
            $id = Auth::user()->getId();
            $type = Auth::user()->where('id', $id)->value('type');
            //var user = 'admin';
            // const admin;
            if ('admin' == $type) {
              return view('admin.index')->with('id',$id);
            }
            else {
              return View('home')->with('id', $id);
            }

        } else {
            return redirect()->guest('login');
        }

    }


}
