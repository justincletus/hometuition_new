<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    //

    public function basic_email(){
      $data = array('name'=>"Online Tutor");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('justinmecse@yahoo.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('onlinetutormumbai@gmail.com','Tutorials Point');
      });
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email(){
      $data = array('name'=>"Online Tutor");
      Mail::send('mail', $data, function($message) {
         $message->to('justinmecse@yahoo.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('onlinetutormumbai@gmail.com','Tutorials Point');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email(){
      $data = array('name'=>"Online Tutor");
      Mail::send('mail', $data, function($message) {
         $message->to('justinmecse@yahoo.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach(public_path(). '/uploads/logo.png' , ['as'=>'logo.png','mime'=>'image/png']);
         $message->attach(public_path(). '/uploads/test.txt');
         $message->from('onlinetutormumbai@gmail.com','Tutorials Point');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}
