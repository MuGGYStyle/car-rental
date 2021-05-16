<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/cars', ['as' => 'cars', 'uses' => 'HomeController@getCars']);
Route::get('/contact/{id}', ['as' => 'contact', 'uses' => 'HomeController@contact']);
Route::post('/order/{id}', ['as' => 'order', 'uses' => 'HomeController@order']);

Route::get('/admin', function () {
	if (Auth::check()) {
		if (Auth::user()->checkRole(1)) {
			return redirect('/admin');
		}
		return view('/admin');
	} else {
		return view('auth.login');
	}
});

// AUTH ROUTES START
Auth::routes();
Route::get('logout', function () {
	Session::flush();
	Auth::logout();
	return redirect('/login');
});
// AUTH ROUTES END

// Admin Routes START
Route::middleware('auth')->group(function() {
	// MIDDLEWARE ADMIN START
	Route::middleware('Admin')->group(function() {
		Route::get('/admin', ['as' => 'admin', 'uses' => 'DashboardController@index']);
        Route::get('/admin/status/{id}/{status}', ['as' => 'admin.change.status', 'uses' => 'DashboardController@changeStatus']);

		Route::resource('/admin/role', 'RoleController', ['names' => [
			'index'  => 'admin.role.index',
			'create' => 'admin.role.create',
			'edit'   => 'admin.role.edit',
			'store'  => 'admin.role.store',
			'show'   => 'admin.role.show',
			'update' => 'admin.role.update',
			'destroy'=> 'admin.role.destroy',
		]]);
		
		Route::resource('/admin/user', 'UserController', ['names' => [
			'index'  => 'admin.user.index',
			'create' => 'admin.user.create',
			'edit'   => 'admin.user.edit',
			'store'  => 'admin.user.store',
			'show'   => 'admin.user.show',
			'update' => 'admin.user.update',
			'destroy'=> 'admin.user.destroy',
		]]);

		Route::resource('/admin/car', 'CarController', ['names' => [
			'index'  => 'admin.car.index',
			'create' => 'admin.car.create',
			'edit'   => 'admin.car.edit',
			'store'  => 'admin.car.store',
			'show'   => 'admin.car.show',
			'update' => 'admin.car.update',
			'destroy'=> 'admin.car.destroy',
		]]);
	});
	// MIDDLEWARE ADMIN END
});
// Admin Routes END
