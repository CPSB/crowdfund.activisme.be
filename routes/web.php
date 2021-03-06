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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@backend')->name('home');

Route::resource('disclaimer', 'DisclaimerController');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/settings', 'AccountSettingsController@index')->name('settings.index');
    Route::post('/settings/info', 'AccountSettingsController@updateInfo')->name('settings.info');
    Route::post('/settings/password', 'AccountSettingsController@updateSecurity')->name('settings.security');

    Route::get('/users/ban/{id}', 'UserController@block')->name('user.ban');
    Route::get('users/unban/{id}', 'UserController@unblock')->name('user.unban');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');

    Route::get('notifications/mark/{id}', 'NotificationsController@markOne')->name('notifications.mark');
    Route::get('notifications/read/all', 'NotificationsController@markAll')->name('notifications.all-read');
    Route::get('notifications/index', 'NotificationsController@index')->name('notifications.index');
});

Route::get('backers', 'BackersController@index')->name('backers');
Route::get('backers/transaction/delete/{id}', 'BackersController@destroy')->name('backers.transaction.delete');
Route::get('backers/create', 'BackersController@create')->name('backers.transaction.create');
Route::post('backers/store', 'BackersController@store')->name('backers.transaction.store');
Route::get('backers/transaction/show/{id}', 'BackersController@showTransaction')->name('backers.transaction.show');
Route::get('backers/delete/{id}', 'BackersController@destroy')->name('backers.transaction.destroy');

Route::get('updates/create', 'UpdatesController@create')->name('updates.create');
Route::get('updates/delete/{id}', 'UpdatesController@destroy')->name('updates.destroy');
Route::get('updates/show/{id}', 'UpdatesController@show')->name('updates.show');
Route::get('updates/edit/{id}', 'UpdatesController@edit')->name('updates.edit');
Route::post('updates/update/{id}', 'UpdatesController@update')->name('updates.update');
Route::post('updates/store', 'UpdatesController@store')->name('updates.store');
