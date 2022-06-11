<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/regis', 'AuthController@regis');
Route::post('/auth/web_login', 'AuthController@web_login');
Route::post('/auth/mobile_login', 'AuthController@mobile_login');
Route::get('/auth/show/{account}','AuthController@show');
Route::middleware('jwt.auth')->get('/auth/users', function(Request $request) {
    return auth()->user()->PIN;
});//checkjwtAuth
Route::get('/auth/ownerstat','AuthController@ownerstat');//checkvalid
Route::get('/auth/logout','AuthController@logout');
Route::get('/auth/tryauth','AuthController@tryAuth');
Route::post('auth/getAuthUser','AuthController@getAuthUser');

Route::post('/contact/addgroup','ContactController@addgroup')->middleware('jwt.verify')->middleware('owner.check');
Route::post('/contact/addcontact','ContactController@addcontact')->middleware('jwt.verify')->middleware('owner.check');
Route::delete('/contact/deletegroup','ContactController@deletegroup')->middleware('jwt.verify')->middleware('owner.check');
Route::get('/contact/search','ContactController@search');
Route::get('/contact/search_arr','ContactController@search_arr');
Route::delete('/contact/delete_contact','ContactController@delete_gc')->middleware('jwt.verify')->middleware('owner.check');

Route::post('/key_management/add','Key_managementController@add')->middleware('jwt.verify')->middleware('owner.check');
Route::delete('/key_management/delete','Key_managementController@delete')->middleware('jwt.verify')->middleware('owner.check');
Route::delete('/key_management/groupdelete','Key_managementController@groupdelete')->middleware('jwt.verify')->middleware('owner.check');
Route::get('key_management/notification','Key_managementController@notification');//checknoti

Route::get('/device/checkvalid','DeviceController@checkValid');
Route::get('/device/mqtt_pub','DeviceController@mqtt_pub');
Route::post('/device/add','DeviceController@add')->middleware('jwt.verify');
Route::put('/device/setOH','DeviceController@setOH')->middleware('jwt.verify')->middleware('owner.check');

Route::get('/log/getlog','LogController@getlog')->middleware('jwt.verify')->middleware('owner.check');

Route::get('/show',function (){
    return json_encode('Hello world');
});

Route::get('/ajax/fetchgroup','AjaxController@fetch_group')->middleware('jwt.verify');
Route::get('/ajax/fetchuser','AjaxController@fetch_user')->middleware('jwt.verify');
Route::get('/ajax/fetchgroup_member','AjaxController@fetch_group_member')->middleware('jwt.verify');
Route::get('/ajax/fetchcontact','AjaxController@fetch_contact')->middleware('jwt.verify');
Route::get('/ajax/fetchkey','AjaxController@fetch_key')->middleware('jwt.verify');
Route::get('/ajax/fetchkey_pres','AjaxController@fetch_key_pres')->middleware('jwt.verify');
Route::get('/ajax/fetchOH','AjaxController@fetch_OH')->middleware('jwt.verify');
Route::get('/ajax/fetchdevice','AjaxController@fetch_device')->middleware('jwt.verify');
Route::get('/ajax/fetchpage_key','AjaxController@fetch_management_page')->middleware('jwt.verify');
Route::get('/ajax/fetchpage_OH','AjaxController@fetch_setOH_page')->middleware('jwt.verify');
Route::get('/ajax/searchgroup','AjaxController@searchgroup')->middleware('jwt.verify');
Route::get('/ajax/ohdata','AjaxController@fetch_OH_data')->middleware('jwt.verify');
Route::get('/ajax/fetch_noti','AjaxController@fetch_notification')->middleware('jwt.verify');
