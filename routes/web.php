<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/customer/create', 'CustomerController@store');
Route::get('/customer/create', 'CustomerController@create');
Route::get('/customer/customers', 'CustomerController@index');

Route::group(['prefix' => 'customer'], function() {
    //permissions need to be attached to the routes
    //Route::get('/create', 'BriefController@create')->name('brief.create');
    //Route::get('/show/{id}', 'BriefController@show')->name('brief.show');
    Route::get('/edit/{id}', 'CustomerController@edit')->name('customer.edit');
    Route::put('/update/{id}', 'CustomerController@update')->name('customer.update');
    Route::delete('/destroy/{id}', 'CustomerController@destroy')->name('customer.destroy');
});
// Route::group(['prefix' => 'customer'], function() {
//     Route::post('/customer/create', 'CustomerController@store')->name('customer.store');
// });
Route::get('/admin','AdminController@admin');
Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');
//profile
Route::get('profile',function () {
    $user = Auth::user();
        return view('layouts.profile')->with(compact('user'));
    });

Route::post('profile', function (Request $request){

    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = Auth::user();

    $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

    $request->avatar->storeAs('avatars',$avatarName);

    //dd($user);
    $user->avatar = $avatarName;
    $user->save();

    return back()
        ->with('success','You have successfully upload image.');

});
// Route::get('/myadminmy', function(){
//     $role = Role::create(['name' => 'Administer']);
//     $permission = Permission::create(['name'=>'Administer roles & permissions']);
//     auth()->user()->assignRole('Administer');
//     auth()->user()->givePermissionTo('Administer roles & permissions');
// });


