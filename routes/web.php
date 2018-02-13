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

/*Event::listen('Illuminate\Database\Events\QueryExecuted',function($query){
    //var_dump($sql);
    var_dump($query->sql);
});*/


//use Cornford\Googlmapper\Facades\MapperFacade;

/*Route::get('/', function () {

    return view('welcome2');

    //return view('map');

    if(file_exists(public_path().'/upload/'.Auth::User()->uuid.'.png')){

        return public_path().'/upload/'.Auth::User()->uuid.'.png';
    }


    \Cornford\Googlmapper\Mapper::map(
           53.3,
           -1.4,
       );

    Mapper::map(
        25.3176,
        82.9739,
        [

        ]

    );
    Mapper::location('Varanasi');





    print '<div style="height:400px; width: 400px;">';
    print Mapper::render();
    print '</div>';
});*/




Auth::routes();

Route::get('/','HomeController@index');
Route::get('/design','HomeController@design');
Route::get('/new-page','HomeController@newPage');

Route::get('/map','HomeController@map');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin','HomeController@admin')->name('admin');

Route::get('verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('change-password','AccountController@changePassword');
Route::post('change-password','AccountController@postPasswordCredentials');
Route::get('change-email','AccountController@changeEmail');
Route::post('change-email','AccountController@postEmailCredentials');

Route::get('my-account','AccountController@myAccount');

Route::resource('states','StateController');
Route::resource('constituencies','ConstituencyController');
Route::resource('groups','GroupController');
Route::resource('users','UserController');
Route::resource('contestants','ContestantController');
Route::resource('polls','PollController');
Route::resource('options','OptionController');
Route::resource('problems','ProblemController');

Route::get('constituencies/{id}/users','ConstituencyController@users');
Route::get('users-poll/{id}','OptionController@usersPoll');
Route::get('mygroup','GroupController@mygroup');

Route::get('group/elect-president','GroupController@electPresident');

Route::get('image-crop', 'ImageController@imageCrop');
Route::post('image-crop', 'ImageController@imageCropPost');

Route::post('options/vote/{id}','OptionController@voteUp');

Route::get('states/{id}/voting','StateController@users');
Route::get('states/{id}/constituencies','StateController@stateWithConstituencies');