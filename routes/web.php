<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DeleteItemController;
use App\Http\Controllers\ProductControllerResource;


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


//Route::get('/users', [UsersController::class,'index']);
//
//Route::get('/profile/{id}', [UsersController::class,'profile']);
//Route::prefix('/dashboard')->group(function () {
//    Route::get('/',function(){
//        echo "welcome to dashboard";
//    });
//    Route::get('/orders',function() {
//        echo "welcome to dashboard orders";
//    });
//
//});
//Route::middleware(['CheckUser'])->group(function () {
//    Route::prefix('/profile')->group(function () {
//        Route::get('/',function(){
//            echo "welcome to profile";
//        });
//        Route::get('/settings',function() {
//            echo "welcome to settings";
//        });
//    });
//});
//Route::get('/', function () {
//    return view('about');
//});
Route::get('/about', [AboutController::class,'index']);
Route::get('/welcome', [HomeController::class,'index']);
//Route::view('/contact','contact');
Route::prefix('/contact')->group(function(){
    Route::get('/',[ContactController::class,'index']);
    Route::get('/data',[ContactController::class,'get_data']);
    Route::post('/save',[ContactController::class,'save'])
        ->name('contact.save');
});
//-----------------start of register----------------
Route::group(['prefix'=>'/auth'],function(){
    Route::get('/register',[RegisterController::class,'index']);
    Route::post('/register',[RegisterController::class,'save'])
    ->name('auth.register');
});
//-----------------end of register----------------
//-----------------start of login----------------

    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'save'])->name('auth.login');

//-----------------end of login----------------
Route::prefix('/dashboard')->group(function(){
    Route::get('/users',[DashboardController::class,'users']);
});
Route::get('/logout',[LogoutController::class,'logout_system']);
Route::get('delete_item',[DeleteItemController::class,'delete_item']);
Route::resources([
    'products'=>ProductControllerResource::class,
]);
