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

Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);

Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);

Route::get('/noPermission', function(){
  return view('permission.noPermission');
});



Route::group(['middleware'=>['authen']],function(){

                Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
                Route::get('/dashboard',['as'=>'dashboard','uses'=>'DashboardController@dashboard']);

    });
Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){

          Route::get('/manage/course',['as'=>'manageCourse','uses'=>'CourseController@getManageCourse']);
          //academic uusgehed zoriulaw modal
          Route::post('/manage/course/insert',['as'=>'postInsertAcademic','uses'=>'CourseController@postInsertAcademic']);
         //program uusgehed zoriulaw
          Route::post('/manage/course/insert-program',['as'=>'postInsertProgram','uses'=>'CourseController@postInsertProgram']);

          //level uusgehed zorulsan route
          Route::post('/manage/course/insert-level',['as'=>'postInsertLevel','uses'=>'CourseController@postInsertLevel']);
          //програм хэсгийн левел харуулах route
          Route::get('/manage/course/showLevel',['as'=>'showLevel','uses'=>'CourseController@showLevel']);
          //шифт замчлал
          Route::post('/manage/course/shift',['as'=>'createShift','uses'=>'CourseController@createShift']);
          //time замчлал
          Route::post('/manage/course/time',['as'=>'createTime','uses'=>'CourseController@createTime']);
          //batch замчлал
          Route::post('/manage/course/batch',['as'=>'createBatch','uses'=>'CourseController@createBatch']);
          //batch замчлал
          Route::post('/manage/course/group',['as'=>'createGroup','uses'=>'CourseController@createGroup']);
          //class замчлал
          Route::post('/manage/course/class',['as'=>'createClass','uses'=>'CourseController@createClass']);
          //
          Route::get('/manage/course/classinfo',['as'=>'showClassInformation','uses'=>'CourseController@showClassInformation']);

          // class устгах
          Route::post('/manage/course/class/delete',['as'=>'deleteClass','uses'=>'CourseController@deleteClass']);
          //засвар

          Route::get('/manage/course/class/edit',['as'=>'editClass','uses'=>'CourseController@editClass']);

       //for Admin
       Route::get('/createUser',function(){
         echo 'this for admin test';
       });


});