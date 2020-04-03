<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// question controller routes
Route::post('AddQuestion','QuestionController@create');
Route::get('ShowQuestion','QuestionController@show');
Route::get('DeleteQuestion/{id}','QuestionController@destroy');
Route::get('ViewQuestion/{id}','QuestionController@view');
Route::get('EditQuestion/{id}','QuestionController@edit');
Route::post('UpdateQuestion','QuestionController@update');

// chapter controllers route
Route::post('AddChapter','ChapterController@Add_Chapter');
Route::get('ShowChapterlist','ChapterController@Show_Chapter_list');
Route::get('DeleteChapter/{id}','ChapterController@Delete_Chapter');
Route::get('EditChapterName/{id}','ChapterController@edit');
Route::post('UpdateChapter','ChapterController@update');

// topic controller route
Route::post('AddTopic','TopicController@Add_Topic');
Route::get('ShowTopiclist','TopicController@Show_Topic_list');
Route::get('DeleteTopic/{id}','TopicController@Delete_Topic');
Route::get('EditTopic/{id}','TopicController@edit');
Route::post('UpdateTopic','TopicController@update');

// Board List controller routes
Route::post('AddBoard','BoardListController@create');
Route::get('ShowBoardlist','BoardListController@show');
Route::get('DeleteBoard/{id}','BoardListController@destroy');

