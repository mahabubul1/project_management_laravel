<?php

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Service;
use App\Project;

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

/*
 * Frontend
 */
Route::get('/', function () {
	$services= Service::where("publication_status",1)->get();
	$projects= Project::where("publication_status",1)->get();
    return view('home', compact('services','projects'));
})->name('home');

Route::get('/price', "PlanController@index")->name('price');
Route::get('/cart', "CartController@index")->name('cart');

/*
 * Ajax Request
 */
Route::post('/addCart',"CartController@setCartItem");
Route::post('/removeCart',"CartController@removeCartItem");

/*
 * Dashboard
 */
Route::get('/admin','DashboardController@index')->name('dashboard');

// User
Route::get('/user/profile','UserController@profile')->name('profile');
Route::get('/user/settings','UserController@accountSettings')->name('accountSettings');
Route::post('/user/update',"UserController@updateProfile")->name('updateProfile');

// Admin, Client, Manager
Route::group(['middleware'=>'role:admin,client,manager'],function(){
	// Ajax
	Route::post('/getTask','TaskController@getTask')->name('getTask');
	Route::post('/createTask','TaskController@createTask')->name('createTask');
	Route::post('/updateTask','TaskController@updateTask')->name('updateTask');
	Route::post('/deleteTask','TaskController@deleteTask')->name('deleteTask');
});

// Admin, Client, Manager, Writer
Route::group(['middleware'=>'role:admin|client|manager|writer'],function(){

	Route::get('/tasks','TaskController@index')->name('tasks');
	Route::get('/task/{id}',"TaskController@viewTask")->name('viewTask');

	// Ajax
	Route::post('/getAjaxTask',"TaskController@getAjaxTask")->name('getAjaxTask');
});

// Admin Role
Route::group(['middleware'=>'role:admin'], function(){
	// User
	Route::get('/users','UserController@index')->name('users');
	Route::get('/profile/{id}','AdminController@viewProfile')->name('viewProfile');
	/*
	 * Ajax
	 */
	// User Ajax
	Route::post('/createUser',"AdminController@createUser")->name('createUser');
	Route::post('/getUser',"AdminController@getUser")->name('getUser');
	Route::post('/getProfile',"AdminController@getProfile")->name('getProfile');
	Route::post('/editUser',"AdminController@editUser")->name('editUser');
	Route::post('/deleteUser',"AdminController@deleteUser")->name('deleteUser');

	/*
	 * Theme Settings
	 */

	Route::get('/theme-setting','AdminController@themeSetting')->name('themeSetting');

	Route::get("services/add", "AdminController@serviceContent")->name("serviceContent");
	Route::get('/services/delete/{id}',   'AdminController@serviceDelete')->name('serviceDelete');
	Route::get('/services/unpublished/{id}','AdminController@serviceUnpublished')->name('serviceUnpublished');
	Route::get('/services/published/{id}','AdminController@servicePublished')->name('servicePublished');

	/*
	 * Theme Settings Ajax Request
	 */

	Route::post('addSetting', 'AdminController@addSetting');

	 //bannar section

	



	 //service section 
	
	 Route::post('/service/store',      'AdminController@serviceSave')->name('serviceStore');
	



	


	//project section 
	
	 Route::post('/add-project-button', 'AdminController@projectButton')->name('projectButton');
	 Route::post('/add-project-action', 'AdminController@projectAction')->name('projectAction');
	 Route::post('/project/store',       'AdminController@projectSave')->name('projectStore');
	 Route::get('/project/delete/{id}',   'AdminController@projectDelete')->name('projectDelete');
	 Route::get('/project/unpublished/{id}','AdminController@projectUnpublished')->name('projectUnpublished');
	 Route::get('/project/published/{id}','AdminController@projectPublished')->name('projectPublished');



	



	//price section 

	
	Route::post('/package/faq/store',        'AdminController@packageFaqSave')->name('packageFaqSave');
});

// Client Role
Route::group(['middleware'=>'role:client'], function(){
	// Orders
	
});

Route::post('/updateUser',"UserController@updateUser");


/*
 * Authentication
 */

Auth::routes();

// User Verify Account
Route::get('verify/{email}/{verify_token}','Auth\RegisterController@verifyRegistrationEmail')->name('verifyEmail');

Route::get('/notifications/{user}',function(User $user){
	return  [
			'readNotifications' => $user->notifications,
			'unreadNotifications' => $user->unreadNotifications,
		];
});

Route::get('/mark_notification_as_read/{user}',function(User $user){
	$user->unreadNotifications->markAsRead();
	return  [
			'readNotifications' => $user->notifications,
			'unreadNotifications' => [],
		];
});