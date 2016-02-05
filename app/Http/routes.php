<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('test',function(){

    $request=\Request::all();
    $target=['url'=>$request['url']];
    $rules=['url'=>'required|url'];
    $message=['url'=>'请输入合法的链接地址','required'=>'链接地址不能为空'];
    $validation=\Validator::make($target,$rules,$message);
    if($validation->fails()){
        $errmes= $validation->errors()->toArray();
        dd($errmes['url'][0]);
    }
    return $request['url'];

});

Route::get('show',function(){
    return view('test');
});

Route::get('url',function(){
    return Request::getRequestUri();
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/','HomeController@index');
    Route::post('/short','HomeController@short');
    Route::get('{urlcode}','HomeController@goUrl');
});
