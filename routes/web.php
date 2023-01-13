<?php

use App\Models\User;
use App\Models\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PwResetController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ReportBugController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\card_detailsController;
use App\Http\Controllers\ImageDetailsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\payment_methodController;



Route::get('/gallery/modern art', [GalleryController::class, 'images_1'])->name('modernart');
Route::get('/gallery/realism', [GalleryController::class, 'images_2'])->name('realism');
Route::get('/gallery/medieval art', [GalleryController::class, 'images_3'])->name('medievalart');
Route::get('/gallery/baroque', [GalleryController::class, 'images_4'])->name('baroque');

Route::get('/art_details/{image}', [ImageDetailsController::class, 'index'])->name('art_detail');
Route::post('/art_details/{image}', [ImageDetailsController::class, 'store'])->name('art_details');


Route::get('/join us', function () {
    return view('pages.joinus');
})->name('joinus');

Route::get('/password reset', [ForgotPasswordController::class, 'forgot'])->name('pwreset');
Route::post('/password reset', [ForgotPasswordController::class, 'password']);

Route::get('/new_password/{email}/{code}', [ForgotPasswordController::class, 'resetlink'])->name('pwresetlink');
Route::post('/new_password/{email}/{code}', [ForgotPasswordController::class, 'newPassword']);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'store']);


Route::post('/usersettings_details', [UserController::class, 'userdetails'])->name('usersettings_details');
Route::post('/usersettings_carddetails', [UserController::class, 'carddetails'])->name('usersettings_carddetails');
Route::post('/usersettings_passwordChange', [UserController::class, 'changePassword'])->name('usersettings_passwordChange');
Route::post('/usersettings_delete', [UserController::class, 'delete'])->name('usersettings_delete');
Route::post('/usersettings_deleteByAdmin', [UserController::class, 'deleteByAdmin'])->name('usersettings_deleteByAdmin');
Route::post('/usersettings_upload', [UserController::class, 'upload'])->name('usersettings_upload');


Route::get('/account settings', [UserController::class, 'usersettings'])->name('user_settings');

Route::get('/user/profile', [UserController::class, 'userprofile'])->name('user_profile');
Route::post('/user/profile', [UserController::class, 'userChangeProfilePic']);

Route::get('/reportbug', [ReportBugController::class, 'index'])->name('reportbug');
Route::post('/reportbug', [ReportBugController::class, 'store']);

Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::post('/gallery/modern art/{image}/likes', [LikeController::class, 'store'])->name('modernart.likes');
Route::delete('/gallery/modern art/{image}/likes', [LikeController::class, 'destroy']);


Route::post('/gallery/realism/{image}/likes', [LikeController::class, 'store'])->name('realism.likes');
Route::delete('/gallery/realism/{image}/likes', [LikeController::class, 'destroy']);

Route::post('/gallery/medieval art/{image}/likes', [LikeController::class, 'store'])->name('medievalart.likes');
Route::delete('/gallery/medieval art/{image}/likes', [LikeController::class, 'destroy']);

Route::post('/gallery/baroque/{image}/likes', [LikeController::class, 'store'])->name('baroque.likes');
Route::delete('/gallery/baroque/{image}/likes', [LikeController::class, 'destroy']);


Route::post('/art_details/{image}/likes', [LikeController::class, 'store'])->name('art_detail.likes');
Route::delete('/art_details/{image}/likes', [LikeController::class, 'destroy']);

Route::get('/user/profile', [FavouriteController::class, 'index'])->name('user_profile');
