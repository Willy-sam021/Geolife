<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('layout');
});

Route::get('/home',[PropertyController::class,'homeshow'])->name('home');

Route::get('/register',[RegisterController::class,'show'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::get('/login',[LoginController::class,'show'])->name('login');
Route::post('/login',[LoginController::class,'store'])->name('login.store');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/page',[AdminController::class,'show'])->name('admin.dashboard');
Route::get('/adminform',[AdminController::class,'showForm'])->name('admin.viewform');
Route::post('/pageform',[AdminController::class,'store'])->name('admin.form');
Route::get('/allproperties',[PropertyController::class,'show'])->name('admin.allprop');
Route::get('/user/allproperties',[PropertyController::class,'showAll'])->name('user.allprop');
Route::get('/prop.details/{id}',[PropertyController::class,'propdeets'])->name('propdeets');
Route::post('/user.interest',[MessageController::class,'user_prop_interest'])->name('user.interest');

Route::get('/page/message',[AdminController::class,'showMessage'])->name('allmessages');
Route::get('/page/reply/{id}',[AdminController::class,'replyMsg'])->name('reply.Msg');
Route::post('/page/sendreply',[AdminController::class,'sendReply'])->name('sendReply.Msg');
Route::get('/user/dashboard',[UserController::class,'userdash'])->name('userdash');
Route::get('/user/profile',[UserController::class,'userProfile'])->name('userProfile');
Route::put('/user/update',[UserController::class,'userUpdate'])->name('userUpdate');
Route::put('/page/edit/reply',[AdminController::class,'editReply'])->name('editReply');
Route::get('/page/allproducts',[AdminController::class,'allproducts'])->name('allproducts');
Route::get('/page/propdetails/{id}',[AdminController::class,'propertyDeets'])->name('propertyDeets');
Route::put('/page/update/prop',[AdminController::class,'propertyupdate'])->name('propertyUpdate');

Route::put('/user/reply',[UserController::class,'editReply'])->name('usereditReply');
Route::get('/user/edit/reply/{id}',[UserController::class,'updateReply'])->name('updateReply');
Route::put('/admin/deletebuyer',[AdminController::class,'deletebuyer'])->name('deletebuyer');
Route::put('/admin/deleteproperty',[AdminController::class,'deleteproperty'])->name('deleteproperty');

//Route::get('/lgaprocess',[LgaController::class,'lgaprocess']);
