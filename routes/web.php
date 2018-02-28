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

          Route::post('/manage/course/class/update',['as'=>'updateClassInfo','uses'=>'CourseController@updateClassInfo']);

          //---------------------------Student Register------------------------------------------------------------------

          Route::get('/student/getregister',['as'=>'getStudentRegister','uses'=>'StudentController@getStudentRegister']);
          Route::post('/student/postregister',['as'=>'postStudentRegister','uses'=>'StudentController@postStudentRegister']);
          Route::get('/student/info',['as'=>'studentInfo','uses'=>'StudentController@studentInfo']);


          //-----------------------------payment-------------------------------------------------------------------------
            Route::get('/student/show/payment',['as'=>'getPayment','uses'=>'FeeController@getPayment']);
            Route::get('/student/payment',['as'=>'showStudentPayment','uses'=>'FeeController@showStudentPayment']);
            Route::get('/student/go/to/payment/{student_id}',['as'=>'goPayment','uses'=>'FeeController@goPayment']);
            Route::post('/student/payment/save',['as'=>'savePayment','uses'=>'FeeController@savePayment']);
            Route::post('/fee/create',['as'=>'createFee','uses'=>'FeeController@createFee']);
            Route::get('/fee/student/pay',['as'=>'pay','uses'=>'FeeController@pay']);
            Route::post('/fee/student/exstray/pay',['as'=>'exstraPay','uses'=>'FeeController@exstraPay']);
            Route::get('/fee/student/print/invoice/{receiptId}',['as'=>'printInvoice','uses'=>'FeeController@printInvoice']);
            Route::get('/fee/student/transaction/delete{transactId}',['as'=>'deleteTransact', 'uses'=>'FeeController@deleteTransact']);
            Route::get('/fee/student/show/level',['as'=>'showLevelStudent', 'uses'=>'FeeController@showLevelStudent']);
            //---------------------- Fee Report ----------------------------------------
            Route::get('/fee/report',['as'=>'getFeeReport','uses'=>'FeeController@getFeeReport']);
            Route::get('/fee/show/fee-report',['as'=>'showFeeReport','uses'=>'FeeController@showFeeReport']);

            //----------------------Student report--------------------------------------

            Route::get('/report/student-list',['as'=>'getStudentList','uses'=>'ReportController@getStudentList']);
            Route::get('/report/student-info',['as'=>'showStudentInfo','uses'=>'ReportController@showStudentInfo']);
            Route::get('/report/student-multi-class',['as'=>'getStudentListMultiClass','uses'=>'ReportController@getStudentListMultiClass']);
            Route::get('/report/student-info-multi-class',['as'=>'showStudentInfoMultiClass','uses'=>'ReportController@showStudentInfoMultiClass']);

            //route test
            Route::get('/create/student/level',['as'=>'createStudentLevel','uses'=>'FeeController@createStudentLevel']);
       //for Admin
       Route::get('/createUser',function(){
         echo 'this for admin test';
       });


});
