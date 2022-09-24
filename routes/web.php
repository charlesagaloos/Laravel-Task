<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

//admin
//Route::get('/','StudentsController@dashboard');

Route::get('/','AdminsController@dashboard');
Route::post('/','AdminsController@dashboard')->name('student.dashboard');

Route::get('/application','AdminsController@index');
Route::post('/application','AdminsController@application')->name('student.app');

Route::get('/pie-charts','AdminsController@piecharts');
Route::post('/pie-charts','AdminsController@piecharts')->name('student.pie');

Route::get('/line-charts','AdminsController@linecharts');
Route::post('/line-charts','AdminsController@linecharts')->name('student.line');

Route::get('/students','AdminsController@create')->name('student.create');
Route::post('/students','AdminsController@store')->name('student.store');

Route::get('/students/edit/{student}','AdminsController@edit')->name('student.edit');
Route::post('/students/{student}','AdminsController@update')->name('student.update');

Route::delete('/students/{student}', 'AdminsController@destroy')->name('student.destroy');


Route::get('/studentlist','AdminsController@downloadPDF');

Route::get('/download-pdf','AdminsController@downloadPDF')->name('student.downloadpdf');


Route::get('/import-form','AdminsController@importform')->name('student.importform');
Route::post('/importfile','AdminsController@import')->name('student.import');

Route::get('/export-excel','AdminsController@exportIntoExcel')->name('student.exportform');
Route::get('/export-csv','AdminsController@exportIntoCSV');

//add announcement
Route::get('/application/add-announcement','AdminsController@addAnnouncement')->name('student.announcement');
Route::post('/announcements','AdminsController@announcement')->name('upload-announce');

//edit announcement
Route::get('/announcement/edit/{student}','AdminsController@showEdit')->name('announcement.edit');
Route::post('/announcement/update/{student}','AdminsController@updateAnnouncement')->name('announcement.update');
//delete announcement
Route::delete('/annountment/delete/{id}','AdminsController@deleteAnnouncement')->name('announcement.delete');

Route::get('/announcements','AdminsController@displayAnnouncements')->name('student.announcement');
// Route::post('/announcement','AdminsController@announcement')->name('')->middleware('isadmin');

Route::get('/new-admin','AdminsController@newadmin')->name('admin.create');
Route::post('/new-admin','AdminsController@adminstore')->name('admin.store');



//search
Route::get('/search','AdminsController@search')->name('admin.search');


//students when login

//dashboard
Route::get('/students/dashboard','StudentsController@dashboard');
Route::post('/students/dashboard','StudentsController@dashboard')->name('student.index');

//profile
Route::get('/students/profile/','StudentsController@profile');
Route::post('/students/profile','StudentsController@profile')->name('student.profile');

//edit profile
Route::get('/students/edit/profile/{student}','StudentsController@editprofile')->name('profile.edit');
Route::put('/students/{student}','StudentsController@updateprofile')->name('profile.update');
