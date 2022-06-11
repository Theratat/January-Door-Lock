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


//view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', ['as' => 'login' ,'uses' => function () {
    return view('login');
}]);

Route::get('/signup', ['as' => 'signup' ,'uses' => function () {
    return view('signup');
}]);

Route::get('bridge', ['as' => 'bridge' ,'uses' => function () {
    return view('bridge');
}]);

Route::get('management', ['as' => 'management' ,'uses' => function () {
       return view('management' ,['groupid' => $_GET['groupid']]); 
}]);

Route::get('/management_site', ['as' => 'management_site' ,'uses' => function () {
    return view('/layouts/management_site');
}]);

Route::get('office_hour', ['as' => 'office_hour' ,'uses' => function () {
    return view('office_hour');
}]);

Route::get('textxlsx', ['as' => 'textxlsx' ,'uses' => function () {
    return view('textxlsx');
}]);

Route::get('groups', ['as' => 'groups' ,'uses' => function () {
    return view('groups',['groupid' => $_GET['groupid']]);
}]);

//main
Route::post('login', ['as' => 'login' ,'uses' => 'AuthController@login']);
Route::post('signup', ['as' => 'signup' ,'uses' => 'AuthController@signup']);
Route::get('logout' , ['as' => 'logout' ,'uses' => 'AuthController@logout']);
Route::post('add-device', ['as' => 'add-device' ,'uses' => 'DeviceController@adddevice']);
Route::post('add-group', ['as' => 'add-group' ,'uses' => 'ContactController@addgroup']);
Route::delete('delete-group', ['as' => 'delete-group' ,'uses' => 'ContactController@deletegroup']);
Route::delete('delete-group-key', ['as' => 'delete-group-key' ,'uses' => 'KeyController@deletekey_group']);
Route::post('add-group-key', ['as' => 'add-group-key' ,'uses' => 'KeyController@addkey_group']);
Route::post('add-contact', ['as' => 'add-contact' ,'uses' => 'ContactController@addcontact']);
Route::delete('delete-key', ['as' => 'delete-key' ,'uses' => 'KeyController@deletekey']);
Route::post('add-key', ['as' => 'add-key' ,'uses' => 'KeyController@addkey']);
Route::put('set_OH', ['as' => 'set_OH' ,'uses' => 'DeviceController@setOH']);
Route::get('open', ['as' => 'open' ,'uses' => 'KeyController@open']);
Route::delete('delete-contact', ['as' => 'delete-contact' ,'uses' => 'ContactController@delete_contact']);
Route::post('textxlsx', 'ContactController@PinFromXlsx');


//fetch ajex data
Route::get('fetch_man', ['as' => 'fetch_man' ,'uses' => 'FetchViewController@fetch_management']);
Route::get('fetch_OH', ['as' => 'fetch_OH' ,'uses' => 'FetchViewController@fetch_OH']);
Route::get('ohdata', ['as' => 'ohdata' ,'uses' => 'FetchViewController@fetch_OH_data']);
Route::get('fetch_group', ['as' => 'fetch_group' ,'uses' => 'FetchViewController@fetch_group']);
Route::get('fetch_contact', ['as' => 'fetch_contact' ,'uses' => 'FetchViewController@fetch_contact']);
Route::get('fetch_user', ['as' => 'fetch_user' ,'uses' => 'FetchViewController@fetch_user']);
Route::get('fetch_device', ['as' => 'fetch_device' ,'uses' => 'FetchViewController@fetch_device']);
Route::get('fetch_key', ['as' => 'fetch_key' ,'uses' => 'FetchViewController@fetch_key']);
Route::get('fetch_group_member', ['as' => 'fetch_group_member' ,'uses' => 'FetchViewController@fetch_group_member']);
Route::get('groupname', ['as' => 'groupname' ,'uses' => 'FetchViewController@searchgroup']);
Route::get('search', ['as' => 'search' ,'uses' => 'ContactController@search']);
Route::get('search_arr', ['as' => 'search_arr' ,'uses' => 'ContactController@PinFromXlsx']);
Route::get('serialcheck', ['as' => 'serialcheck' ,'uses' => 'DeviceController@serialcheck']);
Route::get('getlog', ['as' => 'getlog' ,'uses' => 'LogController@getlog']);



// testing route

Route::post('printrequest', ['as' => 'printrequest' ,'uses' => 'FetchViewController@req']);
