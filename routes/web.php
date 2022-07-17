<?php



Route::get('/', function () {
    return view('welcome');
});


route::get('sede', 'PagesController@sede')->name('sede');
route::get('sedejson', 'PagesController@sedejson')->name('sedejson');