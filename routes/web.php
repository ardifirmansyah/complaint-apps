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
Route::get('/',function (){
    return view( 'auth.login');
});
Route::middleware(['IsAdmin'])->group(function (){
    Route::get('/home-ad','PageController@dashboardadmin')->name('homeadmin');
    Route::get('/create-kategori','KategoriController@create')->name('createkategori');
    Route::get('/edit-kategori','KategoriController@edit')->name('editkategori');
    Route::put('/update-kategori/{id}','KategoriController@update')->name('updatekategori');
    Route::delete('/delete-kategori/{id}','KategoriController@destroy')->name('deletekategori');
    Route::post('/store-kategori','KategoriController@store');
    Route::get('/statistik','PageController@statistic')->name('statistic');
    Route::get('/view-complaint','ComplaintController@getComplaintAll')->name('viewcomplaint');
    Route::get('/view-complaint-detail/{id}','ComplaintController@getComplaintDetail')->name('viewdetail');
    Route::get('/view-complaint-status/{status}','ComplaintController@getComplaintStatus')->name('viewstatus');
});
Route::middleware(['IsFreelancer'])->group(function(){
    Route::get('/home-fl','ComplaintController@getComplaint')->name('homefl');
    Route::get('/new-complaint','ComplaintController@create')->name('newcomplaint');
    Route::post('/save','ComplaintController@store');
//    Route::get('/get-complaint','ComplaintController@getComplaint');
});

//Route::get('/home-fl','PageController@dashboardfl')->name('homefl')->middleware('IsFreelancer');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/createKategori','KategoriController@create')->name('createKategori');
//Route::post('/storeKategori','KategoriController@store');


