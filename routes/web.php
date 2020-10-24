<?php

use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;
use Yajra\Datatables\Datatables;


Route::get('/apply_absent', 'ApplyAttendanceController@absent');

Route::get('/apply_present', 'ApplyAttendanceController@present');

Route::get('/apply_holiday', 'ApplyAttendanceController@holiday');

Route::get('/attendance/view', 'ApplyAttendanceController@show');

Route::get('/attendance/filter', 'ApplyAttendanceController@filter');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    echo "SUCCESS CACHE CLEAR";
});

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Employee route
Route::get('/employees/add', 'EmployeesController@create')->middleware('auth');

Route::post('/employees/add', 'EmployeesController@store')->middleware('auth');

Route::get('/employees/view', 'EmployeesController@show')->middleware('auth');

Route::get('/employees/edit/{id}', 'EmployeesController@edit')->middleware('auth');

Route::post('/employees/edit/{id}', 'EmployeesController@update')->middleware('auth');

Route::get('/employees/delete/{id}', 'EmployeesController@destroy')->middleware('auth');

// Position route
Route::get('/employees/position', 'PositionController@show')->middleware('auth');

Route::post('/position/store', 'PositionController@store')->middleware('auth');

Route::get('/position/delete/{id}', 'PositionController@destroy')->middleware('auth');

Route::get('/position/edit/{id}', 'PositionController@edit')->middleware('auth');

Route::post('/position/update/{id}', 'PositionController@update')->middleware('auth');


// SessionsController

Route::get('/sessions', 'SessionsController@create')->middleware('auth');

Route::post('/addsession', 'SessionsController@store')->middleware('auth');

Route::get('/editsession/{id}', 'SessionsController@edit')->middleware('auth');

Route::post('/updatesession/{id}', 'SessionsController@update')->middleware('auth');

Route::get('/deletesession/{id}', 'SessionsController@destroy')->middleware('auth');



Route::get('/subjects', 'SubjectController@create')->middleware('auth');

Route::post('/subject/store', 'SubjectController@store')->middleware('auth');

Route::get('/subject/{id}', 'SubjectController@edit')->middleware('auth');

Route::post('/subject/update/{id}', 'SubjectController@update')->middleware('auth');

Route::get('/subject/delete/{id}', 'SubjectController@destroy')->middleware('auth');


Route::get('/sections', 'SectionsController@create')->middleware('auth');

Route::post('/addsections', 'SectionsController@store')->middleware('auth');

Route::get('/deletesection/{id}', 'SectionsController@destroy')->middleware('auth');

Route::get('/section/{id}', 'SectionsController@edit')->middleware('auth');

Route::post('/sectionupdate/{id}', 'SectionsController@update')->middleware('auth');


Route::get('/classes', 'ClassesController@create')->middleware('auth');

Route::post('/addclasses', 'ClassesController@store')->middleware('auth');

Route::get('/class/{id}', 'ClassesController@edit')->middleware('auth');

Route::post('/updateclass/{id}', 'ClassesController@update')->middleware('auth');

Route::get('/deleteclass/{id}', 'ClassesController@destroy')->middleware('auth');


Route::get('/schoolmoney', 'SchoolmoneyController@create')->middleware('auth');

Route::post('/addschoolmoney', 'SchoolmoneyController@store')->middleware('auth');

Route::get('/schoolmoney/{id}', 'SchoolmoneyController@edit')->middleware('auth');

Route::post('/updateschoolmoney/{id}', 'SchoolmoneyController@update')->middleware('auth');

Route::get('/deleteschoolmoney/{id}', 'SchoolmoneyController@destroy')->middleware('auth');


// Route::get('/students', 'StudentsController@index');

Route::get('/students/dashboard', 'StudentsController@dashboard')->middleware('auth');

Route::get('/students/invoice/print/{id}', 'StudentsController@invoice_print')->middleware('auth');

Route::get('/students/admission', 'StudentsController@create')->middleware('auth');

Route::get('/get-total-fess', 'StudentsController@get_total_fess')->middleware('auth');

Route::get('getRouteFromClass', 'StudentsController@getRouteFromClass')->middleware('auth');

Route::get('/get-student-by-class', 'StudentsController@get_student_by_class')->middleware('auth');

Route::get('/get-balance', 'StudentsController@get_balance')->middleware('auth');

Route::post('/students-add', 'StudentsController@store')->middleware('auth');

Route::get('/students/view', 'StudentsController@show')->middleware('auth');

Route::get('/students/edit/{id}', 'StudentsController@edit')->middleware('auth');

Route::post('/students-edit/{id}', 'StudentsController@update')->middleware('auth');

// Route::get('/students/deactive/{id}', 'StudentsController@deactivate');

Route::get('/students/destroy/{id}', 'StudentsController@destroy')->name('students.destroy')->middleware('auth');

Route::get('/students/trash', 'StudentsController@students_trash')->middleware('auth');

Route::get('/students/restore/{id}', 'StudentsController@students_restore')->middleware('auth');


Route::get('/student-pass', 'StudentsController@student_pass')->middleware('auth');

Route::get('/student-fail', 'StudentsController@student_fail')->middleware('auth');

Route::get('/students/remove-image/{id}', 'StudentsController@remove_image');

Route::get('getstudents', 'StudentsController@getStudents')->name('get.students');

Route::post('/students/export', 'StudentsController@excel_export');

Route::get('/serach/students', 'StudentsController@serach_students')->name('get.students_search');

Route::get('/student/single/view', 'StudentsController@student_single_view')->middleware('auth');

Route::get('/student/single/feecollection', 'FeescollectionController@student_single_feecollection_view')->middleware('auth');

Route::get('/student/name', 'StudentsController@student_name_get');
// END STUDENTS ROUTE


Route::get('/parents/add', 'ParentsController@index')->middleware('auth');

Route::get('/parents/view', 'ParentsController@show')->middleware('auth');

Route::get('/parents/serach', 'ParentsController@serach_parents')->middleware('auth');

Route::post('/parents/bulk-sms', 'ParentsController@bulk_sms')->middleware('auth');

Route::post('/parentsadd', 'ParentsController@store')->middleware('auth');

Route::get('/parents/edit/{id}', 'ParentsController@edit')->middleware('auth');

Route::post('/parents/update/{id}', 'ParentsController@update')->middleware('auth');

Route::post('/add-parent-modal', 'ParentsController@create')->middleware('auth');

Route::get('/get-parent', 'ParentsController@get_parent')->middleware('auth');

Route::get('/parent/delete/{id}', 'ParentsController@destroy')->middleware('auth');

Route::get('/parent/serach', 'ParentsController@parents_filter')->middleware('auth');

Route::get('/parents/trash', 'ParentsController@parent_trash')->middleware('auth');

Route::get('/parents/restore/{id}', 'ParentsController@parents_restore')->middleware('auth');


Route::get('/feescollections/dashboard', 'FeescollectionController@dashboard')->middleware('auth');

Route::get('/feescollections/add', 'FeescollectionController@index')->middleware('auth');

Route::get('/feescollections/view', 'FeescollectionController@show')->middleware('auth');

Route::get('/feescollections/edit/{id}', 'FeescollectionController@edit')->middleware('auth');

Route::get('/feescollections/cancel/{id}', 'FeescollectionController@cancel_fees')->middleware('auth');

Route::get('/feescollections/serach', 'FeescollectionController@serach_feescollections')->middleware('auth');

Route::post('/feescollections/update/{id}', 'FeescollectionController@update')->middleware('auth');

Route::get('/get-class-stream-fee', 'FeescollectionController@get_class_stream_fessDetails')->middleware('auth');

Route::post('/feescollections/add', 'FeescollectionController@add_fees_method')->middleware('auth');

Route::get('/feescollections/delete/{id}', 'FeescollectionController@destroy')->middleware('auth');

Route::get('/students/getStudentFees/{studentid}', 'StudentsController@getStudentFeescollectionsFees')->middleware('auth');

Route::get('/feescollections/invoice-print/{id}', 'FeescollectionController@invoice_print')->middleware('auth');

Route::get('/feescollections/trash/', 'FeescollectionController@feescollections_trash')->middleware('auth');

Route::get('/feescollection/restore/{id}', 'FeescollectionController@feescollections_restore')->middleware('auth');


Route::get('/busFeesCollections/add', 'BusFeesController@create')->middleware('auth');

Route::get('/busFeesCollections/view', 'BusFeesController@show')->middleware('auth');

Route::get('/users', 'UsersController@create')->middleware('auth');

Route::post('/users/post', 'UsersController@store')->middleware('auth');

Route::get('/users/disabled/{id}', 'UsersController@disabled')->middleware('auth');

Route::get('/users/enabled/{id}', 'UsersController@enabled')->middleware('auth');

Route::get('/user/{id}', 'UsersController@edit')->middleware('auth');

Route::post('/users/edit/{id}', 'UsersController@update')->middleware('auth');

Route::get('users/profile', 'UsersController@index')->middleware('auth');

Route::post('users/profile/update', 'UsersController@profile_update')->middleware('auth');

Route::post('bulk_sms', 'ParentsController@bulk_sms')->middleware('auth');

Route::post('send-bulk-sms', 'SendsmsController@send_message')->middleware('auth');

Route::post('save-sms', 'MessageController@store')->middleware('auth');

Route::get('get-sms', 'MessageController@show')->middleware('auth');


// Transport route
Route::get('/transport/vehicles', 'VehicleController@show');

Route::post('/vehicle/store', 'VehicleController@store')->middleware('auth');

Route::get('/transport/vehicle/{id}', 'VehicleController@edit');

Route::post('/vehicle/update/{id}', 'VehicleController@update')->middleware('auth');

Route::get('/vehicle/delete/{id}', 'VehicleController@destroy')->middleware('auth');

Route::get('/vehicle/route', 'VehicleStopController@show');

Route::post('/route/store', 'VehicleStopController@store')->middleware('auth');

Route::get('/route/edit/{id}', 'VehicleStopController@edit');

Route::post('/route/update/{id}', 'VehicleStopController@update')->middleware('auth');

Route::get('/route/delete/{id}', 'VehicleStopController@destroy')->middleware('auth');

Route::get('/route/plan', 'VehicleStopFeeController@show');

Route::post('/route/plan/store', 'VehicleStopFeeController@store')->middleware('auth');

Route::get('/route/plan/edit/{id}', 'VehicleStopFeeController@edit');

Route::post('/route/plan/update/{id}', 'VehicleStopFeeController@update')->middleware('auth');

Route::get('/vehicle-fee-mode', 'FeeModeController@show');

Route::post('/vehicle-fee-mode/store', 'FeeModeController@store')->middleware('auth');

Route::get('/vehicle-fee-mode/edit/{id}', 'FeeModeController@edit');

Route::get('/vehicle-fee-mode/delete/{id}', 'FeeModeController@destroy')->middleware('auth');

Route::post('/vehicle-fee-mode/update/{id}', 'FeeModeController@update')->middleware('auth');

Route::get('/transport/feescollections/add', 'TransportFeecollectionController@create');

Route::post('/transport/feescollections/add', 'TransportFeecollectionController@store')->middleware('auth');

Route::get('getStudentTravellingSchemeDetails', 'TransportFeecollectionController@getStudentTravellingSchemeDetails');

Route::get('getTenureAmount', 'TransportFeecollectionController@getTenureAmount');

Route::get('/transport/feescollections/show', 'TransportFeecollectionController@show');

Route::get('/transport/feescollections/invoice/{id}', 'TransportFeecollectionController@invoice');

Route::get('/transport/feescollections/delete/{id}', 'TransportFeecollectionController@destroy')->middleware('auth');

Route::get('/transport/feescollections/dashboard', 'TransportFeecollectionController@dashboard');

Route::get('/student/transport/feecollection/show', 'TransportFeecollectionController@sigleStudenttransportFeeCollectionShow');

Route::get('/getTransportScheme', 'TransportFeecollectionController@getTransportScheme');
