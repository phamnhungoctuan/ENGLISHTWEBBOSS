<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);

Route::get('/', 'HomePageController@getListHome')->name('home');

Route::group(['prefix' => 'post'], function() {
	
	Route::group(['prefix' => '{url}.{id}'], function(){
		Route::get('/', ['as' => 'getPost', 'uses' =>'PostController@getPost']);
		Route::group(['prefix' => 'lesson.{idls}'], function(){
			Route::get('/', ['as' => 'getLesson', 'uses' => 'PostController@getLesson']);
			Route::post('submit', ['as' => 'checkanswer', 'uses' => 'PostController@checkanswer']);
		});
	});
});

Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

Route::get('register', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);

Route::post('register', ['as' => 'postRegister', 'uses' => 'RegisterController@postRegister']);


Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'pt32admin'], function() {
			/*admin link*/
			Route::get('/', function(){
				if (Auth::user()->level == 1) {
					return view('admin.home');
				} else 
					return redirect('login');
			});
			//User link
			Route::group(['prefix' => 'user'], function() {
				Route::get('/', function(){
					return redirect()->route('user');
				});
				Route::get('list', 'UserController@getUserList')->name('user');
				
				Route::get('add', ['as' => 'getAddUser', 'uses' => 'UserController@getAddUser']);
				Route::post('add', ['as' => 'postAddUser', 'uses' => 'UserController@postAddUser']);

				Route::get('delete/{id}', ['as' => 'DeleteUser', 'uses' => 'UserController@DeleteUser'])->where('id', '[0-9]+');
				Route::get('edit/{id}', ['as' => 'getEditUser', 'uses' => 'UserController@getEditUser'])->where('id', '[0-9]+');
				Route::post('edit/{id}', ['as' => 'postEditUser', 'uses' => 'UserController@postEditUser'])->where('id', '[0-9]+');
			});
			//Category link
			Route::group(['prefix' => 'category'], function() {
				Route::get('/', function(){
					return redirect()->route('category');
				});
				Route::get('list','CateController@getCateList')->name('category');

				Route::get('add', ['as' => 'getAddCate', 'uses' => 'CateController@getAddCate']);
				Route::post('add', ['as' => 'postAddCate', 'uses' => 'CateController@postAddCate']);
				Route::get('delete/{id}', ['as' => 'DeleteCate', 'uses' => 'CateController@DeleteCate'])->where('id', '[0-9]+');
				Route::get('edit/{id}', ['as' => 'getEditCate', 'uses' => 'CateController@getEditCate'])->where('id', '[0-9]+');
				Route::post('edit/{id}', ['as' => 'postEditCate', 'uses' => 'CateController@postEditCate'])->where('id', '[0-9]+');
				Route::get('{url}.post:{id}', ['as' => 'postCateofNews', 'uses' => 'CateController@postCateofNews'])->where('id', '[0-9]+');
			});

			//News Link
			Route::group(['prefix' => 'news'], function() {
				Route::get('/', function(){
					return redirect()->route('news');
				});
				Route::get('list', 'NewsController@getNewList')->name('news');
				Route::get('add', ['as' => 'getNewAdd', 'uses' => 'NewsController@getNewAdd']);
				Route::post('add', ['as' => 'postNewAdd', 'uses' => 'NewsController@postNewAdd']);
				Route::get('delete/{id}', ['as' => 'getDeleteNews', 'uses' => 'NewsController@getDeleteNews'])->where('id', '[0-9]+');
				Route::get('edit/{id}/{check}', ['as' => 'getEditNews', 'uses' => 'NewsController@getEditNews'])->where('id', '[0-9]+');
				Route::post('edit/{id}/{check}', ['as' => 'postEditNews', 'uses' => 'NewsController@postEditNews'])->where('id', '[0-9]+');
				Route::group(['prefix' => 'lesson'], function() {
					Route::get('/', function() {
						return redirect()->route('news');
					});
					Route::group(['prefix' => '{id}'], function() {
						Route::get('/', ['as' => 'getLessonAdmin', 'uses' => 'PostController@getLessonAdmin']);
						Route::get('add', ['as' => 'getAddLesson', 'uses' => 'PostController@getAddLesson']);
						Route::post('add', ['as' => 'postAddLesson', 'uses' => 'PostController@postAddLesson']);
						Route::get('edit/{idls}', ['as' => 'getEditLesson', 'uses' => 'PostController@getEditLesson']);
						Route::post('edit/{idls}', ['as' => 'postEditLesson', 'uses' => 'PostController@postEditLesson']);
						Route::get('delete/{idls}', ['as' => 'deleteLesson', 'uses' => 'PostController@deleteLesson']);
						Route::post('addtask/{idls}', ['as' => 'addtask', 'uses' => 'PostController@addtask']);
						Route::get('deltask/{idls}/{idtask}', ['as' => 'deltask', 'uses' => 'PostController@deltask']);
						Route::get('edittask/{idls}/{idtask}', ['as' => 'getedittask', 'uses' => 'PostController@getedittask']);
						Route::post('edittask/{idls}/{idtask}', ['as' => 'postedittask', 'uses' => 'PostController@postedittask']);
					});
				});
			});
	});

});

