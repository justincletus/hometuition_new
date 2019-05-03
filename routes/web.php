<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('main');
//});
//
//Route::get('foo', function () {
//    return 'Hello World';
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('/', 'PagesController@getIndex')->name('home');

// Added specifically for articles and article single page
// Route::get('article/{slug}', 'ArticlesController@getSingle');

Route::resource('articles', 'ArticlesController');
//Route::get('articles/getshow/{id}', 'ArticlesController@getShow');
Route::get('articles/{slug}', ['as' => 'articles', 'uses' => 'ArticlesController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::resource('projects', 'ProjectsController');
Route::get('projects/{slug}', ['as' => 'projects', 'uses' => 'ProjectsController@show'])->where('slug', '[A-Za-z0-9-_]+');


// Route::resource('posts', 'PostsController');


// We'll talk these new route later
Route::resource('/comments', 'CommentsController');

Route::resource('/services', 'ServicesController');

Route::get('/schools/syllabus', 'SchoolsController@syllabus');
Route::post('/schools/getstandard/{examboardId}', 'SchoolsController@getstandard');

Route::post('/schools/getsubject/{subId}/{exam}', 'SchoolsController@getsubject');

Route::post('/schools/getsyllabus/{exam}/{std}/{subid}', 'SchoolsController@getsyllabus');

//Route::post('getsyllabusdetails', 'SchoolsController@getSyllabusDetails');


Route::get('/schools', 'SchoolsController@index');
Route::post('/schools/schoolname/{search}', 'SchoolsController@schoolname');


Route::resource('/colleges', 'CollegesController');
Route::get('colleges/{slug}', ['as' => 'colleges', 'uses' => 'CollegesController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::get('/getstate', 'CollegesController@getState');
Route::get('/getcity', 'CollegesController@getCity');
Route::get('/getuniversity', 'CollegesController@getUniversity');

Route::resource('/university', 'UniversityController');
Route::get('university/{slug}', ['as' => 'university', 'uses' => 'UniversityController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::post('/university/getcity/{sta_id}', 'UniversityController@getcity');
Route::post('/university/getuniversity/{cityID}', 'UniversityController@getuniversity');
Route::post('/university/getcolleges/{uniID}', 'UniversityController@getcolleges');


Route::resource('/examination', 'ExamController');
Route::get('examination/{slug}', ['as' => 'examination', 'uses' => 'ExamController@show'])->where('slug', '[A-Za-z0-9-_]+');
Route::get('examination/getexamdetails/{slug}', ['as' => 'examination', 'uses' => 'ExamController@getExamDetails'])->where('slug', '[A-Za-z0-9-_]+');

//Route::resource('/examdetails', 'ExamDetailsController');
//Route::get('examdetails/{slug}', ['as' => 'examdetails', 'uses' => 'ExamDetailsController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::get('/syllabus', 'ExamController@syllabus');

Route::resource('courses', 'CoursesController');
Route::get('courses/{slug}', ['as' => 'courses', 'uses' => 'CoursesController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::resource('/admissions', 'AdmissionController');

Route::resource('/supports', 'SupportsController');
Route::get('supports/{slug}', ['as' => 'supports', 'uses' => 'SupportsController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::resource('/library' , 'LibraryController');
Route::resource('/books', 'BooksController');
Route::get('books/{slug}', ['as' => 'books', 'uses' => 'BooksController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::resource('/google' , 'GoogleController');
Route::get('/google/login' , 'GoogleController@login');

Route::get('/supports/{id}/{name}', 'SupportsController@show');
// Route::get('/supports/supportList', 'SupportsController@supportList' );

// Route::get('/',   function () {
//     return view('main');
// });

Route::get('/',   'TutorController@index');
Route::get('/{slug}', ['uses' => 'TutorController@show'])->where('slug', '[A-Za-z0-9-_]+');

Route::resource('notes',   'NotesController');
Route::get('notes/{slug}', ['as'=>'notes', 'uses' => 'NotesController@show'])->where('slug', '[A-Za-z0-9-_]+');
Route::get('notes/getprograms/{slug}', ['as'=>'notes', 'uses' => 'NotesController@getPrograms'])->where('slug', '[A-Za-z0-9-_]+');


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

//Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('/admin/logout', function(){
    Auth::logout();
    return redirect('/admin');
});

//Route::get('/home', 'HomeController@index')->name('home');



// Admin routes
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

Route::post('/contacts', 'TutorController@contacts');
Route::get('/contactus', function(){

    return view('frontviews.pages.contactus');

});

// Route::resource('/contacts', 'PagesController@ContactDetails');

Route::get('pages/contacts', 'PagesController@ContactDetails');

Route::get('pages/files', 'PagesController@files');

Route::get('pages/filedetails', 'PagesController@filedetails');

Route::resource('pages', 'PagesController');
Route::get('pages/{slug}', ['as' => 'pages', 'uses' => 'PagesController@show'])->where('slug', '[A-Za-z0-9-_]+');

// Route::delete('pages/{id}', 'PagesController@destroy')->name('pages.destroy');

Route::post('pages/store', 'PagesController@store');

Route::post('pages/filesstore', 'PagesController@filesstore');

// Route::get('pages/googlesheet', 'PagesController@googleSheet');

Route::get('pages/googlefiles', 'PagesController@googleSheetView');

Route::get('ckeditor', function(){
    return view('admin.pages.ckeditor');
});

