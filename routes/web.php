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

Route::get('/', [
	'uses' => 'FrontendsController@index',
	'as' => 'home.frontpage',
	]);

Route::get('/post/{slug}', [
	'uses' => 'FrontendsController@singlePost',
	'as' => 'single.post',
	]);

Route::get('/category/{slug}', [
	'uses' => 'FrontendsController@category',
	'as' => 'category.single',
	]);

Route::get('/tag/{slug}', [
	'uses' => 'FrontendsController@tag',
	'as' => 'tag.single',
	]);

Route::get('/search-result', [
	'uses' => 'FrontendsController@search',
	'as' => 'search.result',
	]);

Route::post('/subscribe', [
	'uses' => 'FrontendsController@subscribe',
	'as' => 'subscribe'
	]);

Auth::routes();


/*creating a route gorup for the admin*/
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {

	Route::get('/home', [
		'uses' => 'HomeController@index',
		'as' => 'home',
		]);

	Route::get('/post/create', [
	'uses' => 'PostsController@create',
	'as' => 'post.create',
	]);

	Route::post('/post/store', [
	'uses' => 'PostsController@store',
	'as' => 'post.store',
	]);

	Route::get('/category/create', [
		'uses' => 'CategoriesController@create',
		'as' => 'category.create',
		]);

	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as' => 'category.store',
		]);

	Route::get('/categories/all', [
		'uses' => 'CategoriesController@index',
		'as' => 'categories',
		]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit',
		]);

	Route::get('/category/delete/{id}', [
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete',
		]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as' => 'category.update',
		]);

	Route::get('/posts/all', [
		'uses' => 'PostsController@index',
		'as' => 'posts'
		]);

	Route::get('/post/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as' => 'post.edit',
		]);

	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete',
		]);

	Route::get('/post/trashed/all', [
		'uses' => 'PostsController@trash',
		'as' => 'trash',
		]);

	Route::get('/post/trash/restore/{id}', [
		'uses' => 'PostsController@restore',
		'as' => 'post.restore',
		]);

	Route::get('/post/trahs/delete/{id}', [
		'uses' => 'PostsController@kill',
		'as' => 'post.kill',
		]);

	Route::post('/post/update/{id}', [
		'uses' => 'PostsController@update',
		'as' => 'post.update',
		]);

	Route::get('/tags/all', [
		'uses' => 'TagsController@index',
		'as' => 'tags',
		]);

	Route::get('/tag/create', [
		'uses' => 'TagsController@create',
		'as' => 'tag.create',
		]);

	Route::post('/tag/save', [
		'uses' => 'TagsController@store',
		'as' => 'tag.store',
		]);

	Route::get('/tag/edit/{id}', [
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit',
		]);

	Route::get('/tag/delete/{id}', [
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete',
		]);

	Route::post('/tag/update/{id}', [
		'uses' => 'TagsController@update',
		'as' => 'tag.update',
		]);

	Route::get('/users/all', [
		'uses' => 'UsersController@index',
		'as' => 'users',
		]);

	Route::get('/users/create', [
		'uses' => 'UsersController@create',
		'as' => 'user.create',
		]);

	Route::post('/user/save', [
		'uses' => 'UsersController@store',
		'as' => 'user.store',
		]);

	Route::get('/user/not_admin/{id}', [
		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin',
		]);

	Route::get('/user/admin/{id}', [
		'uses' => 'UsersController@admin',
		'as' => 'user.admin',
		]);

	Route::get('/user/profile', [
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile',
		]);

	Route::post('/user/profile/update', [
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update',
		]);

	Route::get('/user/delete/{id}', [
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete',
		]);

	Route::get('/user/trashed/all', [
		'uses' => 'UsersController@getTrashed',
		'as' => 'user.trashed',
		]);

	Route::get('/user/restore/{id}', [
		'uses' => 'UsersController@restore',
		'as' => 'user.restore',
		]);

	Route::get('/user/delete-permanently/{id}', [
		'uses' => 'UsersController@kill',
		'as' => 'user.kill',
		]);

	Route::get('/settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings',
		]);

	Route::post('/settings/update', [
		'uses' => 'SettingsController@update',
		'as' => 'setting.update'
		]);
});


