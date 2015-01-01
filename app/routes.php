<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('as'=>'index', 'uses'=>'LoginController@index'));
Route::get('login', array('as'=>'login', 'uses'=>'LoginController@login'));
Route::post('login/user', array('uses'=>'LoginController@loginUser'));
Route::get('register', array('as'=>'reg', 'uses'=>'LoginController@register'));
Route::post('register/user', array('uses'=>'LoginController@registerUser'));
Route::get('profile', array('as'=>'profile', 'uses'=>'LoginController@profile'));
Route::get('profile/edit', array('as'=>'edit_profile', 'uses'=>'LoginController@editProfile'));
Route::post('profile/edit/confirm', array('before'=>'csrf', 'uses'=>'LoginController@confProfile'));
Route::get('logout', array('as'=>'logout', 'uses'=>'LoginController@logout'));

Route::get('author/new', array('as'=>'new', 'uses'=>'AuthorController@add'));
Route::post('author/add', array('before'=>'csrf', 'uses'=>'AuthorController@added'));
Route::get('author/{id}', array('as'=>'authPro', 'uses'=>'AuthorController@profile'));
Route::get('author/{id}/update', array('as'=>'update', 'uses'=>'AuthorController@update'));
Route::post('author/updated', array('as'=>'updated', 'uses'=>'AuthorController@updated'));
Route::get('author/{id}/delete', array('as'=>'delete', 'uses'=>'AuthorController@delete'));
Route::post('author/deleted', array('before'=>'csrf', 'uses'=>'AuthorController@deleted'));

Route::get('blog', array('as'=>'blog', 'uses'=>'BlogController@index'));
Route::get('blog/new', array('as'=>'bnew', 'uses'=>'BlogController@bnew'));
Route::post('blog/add', array('before'=>'csrf', 'uses'=>'BlogController@badd'));
Route::get('blog/{id}', array('as'=>'bpage', 'uses'=>'BlogController@bpage'));
Route::get('blog/{id}/edit', array('as'=>'bedit', 'uses'=>'BlogController@bedit'));
Route::post('blog/edit', array('before'=>'csrf', 'uses'=>'BlogController@bupdate'));
Route::get('blog/{id}/delete', array('as'=>'bdel', 'uses'=>'BlogController@bdelete'));
Route::post('blog/deleted', array('before'=>'csrf', 'uses'=>'BlogController@bdeleted'));

Route::get('user/{id}', array('as'=>'user', 'uses'=>'UserController@userProfile'));
Route::get('user/{id}/edit', array('as'=>'edit_user', 'uses'=>'UserController@editUser'));
Route::post('user/editted', array('before'=>'csrf', 'uses'=>'UserController@userEditted'));
Route::get('user/{id}/delete', array('as'=>'delete_user', 'uses'=>'UserController@deleteUser'));
Route::post('user/{id}/deleted', array('before'=>'csrf', 'uses'=>'UserController@userDeleted'));

Route::get('test', array('as'=>'test', 'uses'=>'TestController@test'));
Route::post('save', array('before'=>'csrf', 'uses'=>'TestController@save'));
