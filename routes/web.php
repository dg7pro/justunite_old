<?php

/*use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;*/

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

Auth::routes();

Route::get('/admin','AdminController@index')->name('admin');



Route::get('states/ajax/{id}','StateController@stateAjax');
Route::get('constituencies/states/ajax/{id}','StateController@stateAjax');
Route::get('states/states/ajax/{id}','StateController@stateAjax');
Route::get('constituency/states/ajax/{id}','StateController@stateAjax');

Route::get('loginToVoteProblem','ProblemController@makeReady');
Route::post('problems/ajax-vote/{id}','ProblemController@ajaxVote');
Route::post('problems/vote/{id}','ProblemController@vote');
Route::post('problems/{problem}/upload-image','ProblemController@uploadImage');

Route::get('constituencies/{id}/members','ConstituencyController@members');
Route::get('constituencies/your-constituency','ConstituencyController@yourConstituency');
Route::post('constituency/track','ConstituencyController@track');
Route::get('constituencies/{id}/contestants','ConstituencyController@contestants');

Route::get('mygroup','GroupController@mygroup');
Route::get('group/elect-president','GroupController@electPresident');

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/faq','HomeController@faq');
Route::get('/new-login','HomeController@newlogin');
Route::get('privacy-policy','HomeController@pp');

Route::get('image-crop', 'ImageController@imageCrop');
Route::post('image-crop', 'ImageController@imageCropPost');

Route::get('users-poll/{id}','OptionController@usersPoll');
Route::post('options/vote/{id}','OptionController@voteUp');

Route::get('loginToVoteParty','PartyController@makeReady');
Route::post('parties/vote/{id}','PartyController@vote');
Route::post('parties/ajax-vote/{id}','PartyController@ajaxVote');
Route::post('parties/{party}/upload-image','PartyController@uploadImage');











Route::post('assign-role','RoleController@assignRole');
Route::post('de-assign-role','RoleController@deAssignRole');


Route::get('states/your-state','StateController@yourState');
Route::get('states/{id}/members','StateController@members');
Route::get('states/{id}/voting','StateController@users');
Route::get('states/{id}/constituencies','StateController@stateWithConstituencies');
Route::get('states/{state}/list-parties','StateController@listParties');
Route::post('states/{state}/attach-parties','StateController@attachParties');
Route::get('states/{state}/list-languages','StateController@listLanguages');
Route::post('states/{state}/attach-languages','StateController@attachLanguages');
Route::get('capitals','StateController@capitals');
Route::get('literacy','StateController@literacy');
Route::get('populations','StateController@populations');
Route::get('chief-ministers','StateController@cm');
Route::get('governor','StateController@governor');
Route::get('ruling-party','StateController@rulingParty');
Route::get('gdp','StateController@gdp');
Route::get('seats','StateController@seats');

Route::post('users/iknow/{id}','UserController@makeKnow');
Route::post('users/revokeknow/{id}','UserController@revokeKnow');
Route::get('uuid/{uid}','UserController@getUserByUuid');
Route::post('users/{user}/upload-image','UserController@uploadImage');
Route::get('members','UserController@totalMembers');

Route::get('loginToVoteUser/{id}','UserController@makeReady');
Route::post('users/vote/{id}','UserController@vote');
Route::post('users/ajax-vote/{id}','UserController@ajaxVote');

Route::get('loginToLike/{id}','UserController@loginToLike');
Route::post('users/like','UserController@like');
Route::post('users/unlike','UserController@unlike');
Route::get('constituencies/{id}/list-members','UserController@listMembers');

Route::post('professions/like','ProfessionController@like');



Route::get('opinions2','OpinionController@index2');
//Route::post('users/like-profession/{id}','UserController@likeProfession');



Route::get('test','UserController@test');







/*
|--------------------------------------------------------------------------
| Resource Routes
|--------------------------------------------------------------------------
|
| All the Resource Routing is done here
|
 */
Route::resource('adds','AddController');
Route::resource('ages','AgeController');
Route::resource('bearers','BearerController');
Route::resource('constituencies','ConstituencyController');
Route::resource('contents','ContentController');
Route::resource('ctypes','CtypeController');
Route::resource('educations','EducationController');
Route::resource('elections','ElectionController');
Route::resource('faqs','FaqController');
Route::resource('genders','GenderController');
Route::resource('groups','GroupController');
Route::resource('images','ImageController');
Route::resource('languages','LanguageController');
Route::resource('links','LinkController');
Route::resource('maritals','MaritalController');
Route::resource('opinions','OpinionController');
Route::resource('options','OptionController');
Route::resource('parties','PartyController');
Route::resource('polls','PollController');
Route::resource('problems','ProblemController');
Route::resource('professions','ProfessionController');
Route::resource('ptypes','PtypeController');
Route::resource('religions','ReligionController');
Route::resource('roles','RoleController');
Route::resource('rups','RupController');
Route::resource('states','StateController');
Route::resource('stypes','StypeController');
Route::resource('users','UserController');


/*Route::get('slider-image-crop', 'ImageController@sliderImageCrop');
Route::post('slider-image-crop', 'ImageController@sliderImageCropPost');*/

/*Route::get('/delete',function (){

    //File::delete('storage/aitc2.jpg');
    Storage::delete('public/lawyer.jpg');

});*/


