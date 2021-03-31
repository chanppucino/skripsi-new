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
/*
|
|--------------------------------------------------------------------------
| Routes Admin
|--------------------------------------------------------------------------
|
*/
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
/*
|
|--------------------------------------------------------------------------
| Routes Admin/Announcements/Pengumuman
|--------------------------------------------------------------------------
|
*/
Route::get('admin/announcements/index', 'App\Http\Controllers\AnnouncementsController@index')->name('announcements.index');
Route::get('admin/announcements/{id}', 'App\Http\Controllers\AnnouncementsController@show')->name('announcements.show');

Route::get('admin/announcements/create', 'App\Http\Controllers\AnnouncementsController@create')->name('announcements.create');
Route::delete('admin/announcements/{id}', 'App\Http\Controllers\AnnouncementsController@destroy')->name('announcements.destroy');

Route::get('admin/announcements/{id}/edit','App\Http\Controllers\AnnouncementsController@edit')->name('announcements.edit');
Route::put('admin/announcements/{id}/update','App\Http\Controllers\AnnouncementsController@update')->name('announcements.update');

Route::post('admin/announcements/store', 'App\Http\Controllers\AnnouncementsController@store')->name('announcements.store');

/*
|
|--------------------------------------------------------------------------
| Routes Admin/News/Beranda
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/news/index', 'App\Http\Controllers\newsController@index');
/*
|
|--------------------------------------------------------------------------
| Routes Admin/Schedules/JadwalKegiatan
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/schedules/index', 'App\Http\Controllers\schedulesController@index');
Route::get('/admin/schedules/create', 'App\Http\Controllers\schedulesController@create');
Route::post('store', 'App\Http\Controllers\schedulesController@store')->name('schedules.store');

