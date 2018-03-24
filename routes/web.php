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

Route::get('loginToVote','ProblemController@makeReady');


Route::get('/','HomeController@index');
Route::get('/design','HomeController@design');
Route::get('/new-page','HomeController@newPage');

Route::get('/new-login','HomeController@newlogin');

Route::get('/map','HomeController@map');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('states/ajax/{id}','StateController@stateAjax');
Route::get('/admin','AdminController@index')->name('admin');

Route::get('change-password','AccountController@changePassword');
Route::post('change-password','AccountController@postPasswordCredentials');
Route::get('change-email','AccountController@changeEmail');
Route::post('change-email','AccountController@postEmailCredentials');

Route::get('my-account','AccountController@myAccount');

//Route::get('problems/voting','ProblemController@voting');
Route::post('problems/vote/{id}','ProblemController@vote');
//Route::post('problems/castVote','ProblemController@vote2');


//Route::get('parties/voting','PartyController@voting');
Route::post('parties/vote/{id}','PartyController@vote');
Route::get('constituencies/your-constituency','ConstituencyController@yourConstituency');
Route::get('states/your-state','StateController@yourState');


Route::resource('states','StateController');
Route::resource('constituencies','ConstituencyController');
Route::resource('groups','GroupController');
Route::resource('users','UserController');
Route::resource('contestants','ContestantController');
Route::resource('polls','PollController');
Route::resource('options','OptionController');
Route::resource('problems','ProblemController');
Route::resource('parties','PartyController');
Route::resource('links','LinkController');

Route::resource('religions','ReligionController');
Route::resource('educations','EducationController');
Route::resource('professions','ProfessionController');
Route::resource('ages','AgeController');
Route::resource('genders','GenderController');
Route::resource('maritals','MaritalController');
Route::resource('contents','ContentController');



Route::resource('roles','RoleController');
Route::post('assign-role','RoleController@assignRole');
Route::post('de-assign-role','RoleController@deAssignRole');

Route::get('constituencies/{id}/members','ConstituencyController@members');
Route::get('states/{id}/members','StateController@members');

Route::get('users-poll/{id}','OptionController@usersPoll');
Route::get('mygroup','GroupController@mygroup');

Route::get('group/elect-president','GroupController@electPresident');

Route::resource('images','ImageController');
Route::get('image-crop', 'ImageController@imageCrop');
Route::post('image-crop', 'ImageController@imageCropPost');

Route::get('slider-image-crop', 'ImageController@sliderImageCrop');
Route::post('slider-image-crop', 'ImageController@sliderImageCropPost');

Route::post('options/vote/{id}','OptionController@voteUp');

Route::get('states/{id}/voting','StateController@users');
Route::get('states/{id}/constituencies','StateController@stateWithConstituencies');
Route::get('states/{state}/list-parties','StateController@listParties');
Route::post('states/{state}/attach-parties','StateController@attachParties');

Route::post('problems/{problem}/upload-image','ProblemController@uploadImage');

Route::get('members','UserController@totalMembers');

Route::get('faq','HomeController@faq');