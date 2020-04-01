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


// chapter controllers route
Route::post('AddChapter','ChapterController@Add_Chapter');
Route::get('ShowChapterlist','ChapterController@Show_Chapter_list');
Route::get('DeleteChapter/{id}','ChapterController@Delete_Chapter');

// topic controller route
Route::post('AddTopic','TopicController@Add_Topic');
Route::get('ShowTopiclist','TopicController@Show_Topic_list');
Route::get('DeleteTopic/{id}','TopicController@Delete_Topic');

