<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');

Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm'])->name('user.login');

/*Reset password*/
Route::get('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('password.forgot');
Route::post('/sent-link-password', [PasswordController::class, 'sentLinkPassword'])->name('sentLinkPassword.forgot');
Route::get('/reset-password/{token}',  [PasswordController::class, 'tokenPassword'])->name('resetPassword.forgot');
Route::post('/new-password', [PasswordController::class, 'newPassword'])->name('newPassword.forgot');

/*Home*/
Route::get('/home', [HomeController::class, 'index'])->name('home.index');



/*Users*/
Route::get('/users', [UsersController::class, 'list'])->name('users.list')->middleware('can:users.list');//admin
Route::get('/user/enable/{id}',  [UsersController::class, 'enable'])->name('user.enable')->middleware('can:user.enable');//admin
Route::get('/user/disable/{id}',  [UsersController::class, 'disable'])->name('user.disable')->middleware('can:user.disable');//admin
Route::get('/user/delete/{id}', [UsersController::class, 'delete'])->name('user.delete')->middleware('can:user.delete');//admin
Route::post('/user/store', [UsersController::class, 'store'])->name('user.store')->middleware('can:user.store');//admin
Route::post('/user/password/update',   [UsersController::class, 'updatePassword'])->name('user.updatepass');//users
Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [UsersController::class, 'update'])->name('user.update');//admin
Route::get('/users/password', [UsersController::class, 'editPassword'])->name('users.password');//users
Route::any('/users/import', [UsersController::class, 'importUsers'])->name('users.import')->middleware('can:users.import');//admin

/*Profile*/
Route::get('/profile', [UsersController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update/{id}', [UsersController::class, 'updateProfile'])->name('profile.update');


