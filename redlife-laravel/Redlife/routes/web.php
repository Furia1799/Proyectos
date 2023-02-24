<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

require __DIR__.'/auth.php';

//dashboard
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//user
Route::resource('users', UserController::class);
Route::get('/profile/{id}',[UserController::class, 'profile'])->name('profile');
Route::get('/search', [UserController::class, 'searchUser'])->name('searchUser');


//config
Route::get('/config',[UserController::class,'config'])-> name('config');
Route::get('/user/avatar/{filename}',[UserController::class,'getImage'])-> name('user.avatar');

//Image
Route::resource('image', ImageController::class);
Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
Route::get('/imagen/{id}', [ImageController::class, 'detailImage'])->name('image.detail');

//coment
Route::resource('comment', CommentController::class);

//like
Route::get('/like/{image_id}',[LikeController::class,'like'])->name('like.save');
Route::get('/dislike/{image_id}',[LikeController::class,'dislike'])->name('like.delete');
Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');

Route::get('/ejemplo', function () {
    return view('ejemplo_boot');
});


