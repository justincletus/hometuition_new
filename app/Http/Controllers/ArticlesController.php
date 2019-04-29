<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;
use Auth;
use Session;
use Purifier;
use Image;
use File;
use Validator;
use Response;
use App\Article;
use App\SubCat;
use App\Category;


// use App\Post;

class ArticlesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      if (Auth::user()) {

        $id = Auth::user()->getId();

        $type = Auth::user()->where('id', $id)->value('type');

        if ('admin' == $type) {

          $articles = Article::paginate(5);

          $subcat_lists = DB::table('articles')
                         ->join('sub_cats', 'articles.subcat_id','=','sub_cats.id')
                         ->get();
          return view('admin.backviews.articles.index', ['articles'=>$articles]);

        }

        else {
          $articles = Article::paginate(5);
          return view('frontviews.articles.index')->with('articles', $articles);
        }

      }

      $articles = Article::paginate(5);
      return view('frontviews.articles.index')->with('articles', $articles);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $subcats = DB::table('sub_cats')->where('cat_id',10)->select('title','id')->get();

      if (Auth::user()) {

        $id = Auth::user()->getId();

        $type = Auth::user()->where('id', $id)->value('type');

        if ('admin' == $type) {

          return view('admin.backviews.articles.create', ['subcats' =>$subcats]);

        }

        else {
          return view('frontviews.articles.create');
        }

      }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {

        $data = $request->validate([
           'title' => 'required|max:255',
         ]);

           $article = new Article();
           $article->title = $data['title'];
           $article->details = $request->details;
           $article->uid = $request->uid;
           $article->subcat_id = $request->subcatdet;
           $article->save();

           return redirect()->route('articles.index');




     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($slug)
     {
        $article = Article::where('slug',$slug)->first();

        $previous = DB::table('articles')->where('id', '<', $article->id)->max('id');
        $next = DB::table('articles')->where('id', '>', $article->id)->min('id');


        if (Auth::user()) {

         $id = Auth::user()->getId();

         $type = Auth::user()->where('id', $id)->value('type');

         if ('admin' == $type) {

           return view('admin.backviews.articles.show',['article'=>$article]);

         }

         else {
           return view('frontviews.articles.show',['article'=>$article]);
         }

       }
              

       $previous2 = Article::where('id',$previous)->first();
       $next2   =   Article::where('id',$next)->first();
       return view('frontviews.articles.show',['article'=>$article, 'previous2'=>$previous2, 'next2'=>$next2]);

     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function getShow($id)
      {
         $article = Article::where('id',$id)->first();

         $previous1 = DB::table('articles')->select('slug','id')->where('id', '<', $article->id)->max('id');

         $previous2 = DB::table('articles')->select('slug','id')->where('id', $previous1)->get();


         $next = DB::table('articles')->where('id', '>', $article->id)->min('id');


        if (Auth::user()) {

          $id = Auth::user()->getId();

          $type = Auth::user()->where('id', $id)->value('type');

          if ('admin' == $type) {

            return view('admin.backviews.articles.show',['article'=>$article]);

          }

          else {
            return view('frontviews.articles.show',['article'=>$article]);
          }

        }


        else {

          return view('frontviews.articles.show',['article'=>$article, 'previous'=>$previous, 'next'=>$next]);

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
        $article = Article::where('id', $id)->first();
        return view('admin.backviews.articles.edit', ['article'=>$article]);
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
        $update = Article::where('id', $id)->first();
        $update->title = $request->title;
        $update->details = $request->details1;
        $update->uid = $request->uid;
        $update->save();

        return redirect()->route('articles.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Article::findOrFail($id);
        $del->delete();

        return redirect()->route('articles.index');
    }
}
