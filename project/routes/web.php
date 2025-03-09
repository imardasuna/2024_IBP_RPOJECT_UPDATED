<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminRoomAvailability;

use App\Http\Controllers\Front\RoomController;
use App\Http\Controllers\Front\BookingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Customer\CustomerHomeController;
use App\Http\Controllers\Customer\CustomerLoginController;
Route::get('/', function () {
    return view('welcome');
});

/*Front*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/photo',[AboutController::class,'photo'])->name('photo');
Route::get('/signup',[AboutController::class,'signup'])->name('signup');

Route::get('/room',[RoomController::class,'index'])->name('room');
Route::get('/room/{id}',[RoomController::class,'single_room'])->name('room_detail');
Route::post('/booking/submit',[BookingController::class,'cart_submit'])->name('cart_submit');
Route::get('/cart',[BookingController::class,'cart_view'])->name('cart');
Route::get('/cart/delete/{id}',[BookingController::class,'cart_delete'])->name('cart_delete');

Route::get('/checkout',[BookingController::class,'checkout'])->name('checkout');
Route::post('/checkout/send',[OrderController::class,'store'])->name('sendorder');




/*Admin*/
Route::get('/admin/home',[AdminHomeController::class,'index'])->name('admin_home')->middleware('admin:admin');

Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');

Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');

Route::get('/admin/reset-password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit',[AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile',[AdminProfileController::class,'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');

Route::get('/admin/slide/view',[AdminSlideController::class,'index'])->name('admin_slide_view')->middleware('admin:admin');
Route::get('/admin/slide/add',[AdminSlideController::class,'add'])->name('admin_slide_add')->middleware('admin:admin');
Route::post('/admin/slide/store',[AdminSlideController::class,'store'])->name('admin_slide_store')->middleware('admin:admin');
Route::get('/admin/slide/edit/{id}',[AdminSlideController::class,'edit'])->name('admin_slide_edit')->middleware('admin:admin');
Route::post('/admin/slide/update/{id}',[AdminSlideController::class,'update'])->name('admin_slide_update')->middleware('admin:admin');
Route::get('/admin/slide/delete/{id}',[AdminSlideController::class,'delete'])->name('admin_slide_delete')->middleware('admin:admin');


Route::get('/admin/feature/view',[AdminFeatureController::class,'index'])->name('admin_feature_view')->middleware('admin:admin');
Route::get('/admin/feature/add',[AdminFeatureController::class,'add'])->name('admin_feature_add')->middleware('admin:admin');
Route::post('/admin/feature/store',[AdminFeatureController::class,'store'])->name('admin_feature_store')->middleware('admin:admin');
Route::get('/admin/feature/edit/{id}',[AdminFeatureController::class,'edit'])->name('admin_feature_edit')->middleware('admin:admin');
Route::post('/admin/feature/update/{id}',[AdminFeatureController::class,'update'])->name('admin_feature_update')->middleware('admin:admin');
Route::get('/admin/feature/delete/{id}',[AdminFeatureController::class,'delete'])->name('admin_feature_delete')->middleware('admin:admin');


Route::get('/admin/photo/view',[AdminPhotoController::class,'index'])->name('admin_photo_view')->middleware('admin:admin');
Route::get('/admin/photo/add',[AdminPhotoController::class,'add'])->name('admin_photo_add')->middleware('admin:admin');
Route::post('/admin/photo/store',[AdminPhotoController::class,'store'])->name('admin_photo_store')->middleware('admin:admin');
Route::get('/admin/photo/edit/{id}',[AdminPhotoController::class,'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/photo/update/{id}',[AdminPhotoController::class,'update'])->name('admin_photo_update')->middleware('admin:admin');
Route::get('/admin/photo/delete/{id}',[AdminPhotoController::class,'delete'])->name('admin_photo_delete')->middleware('admin:admin');

Route::get('/admin/amenity/view',[AdminAmenityController::class,'index'])->name('admin_amenity_view')->middleware('admin:admin');
Route::get('/admin/amenity/add',[AdminAmenityController::class,'add'])->name('admin_amenity_add')->middleware('admin:admin');
Route::post('/admin/amenity/store',[AdminAmenityController::class,'store'])->name('admin_amenity_store')->middleware('admin:admin');
Route::get('/admin/amenity/edit/{id}',[AdminAmenityController::class,'edit'])->name('admin_amenity_edit')->middleware('admin:admin');
Route::post('/admin/amenity/update/{id}',[AdminAmenityController::class,'update'])->name('admin_amenity_update')->middleware('admin:admin');
Route::get('/admin/amenity/delete/{id}',[AdminAmenityController::class,'delete'])->name('admin_amenity_delete')->middleware('admin:admin');

Route::get('/admin/room/view',[AdminRoomController::class,'index'])->name('admin_room_view')->middleware('admin:admin');
Route::get('/admin/room/add',[AdminRoomController::class,'add'])->name('admin_room_add')->middleware('admin:admin');
Route::post('/admin/room/store',[AdminRoomController::class,'store'])->name('admin_room_store')->middleware('admin:admin');
Route::get('/admin/room/edit/{id}',[AdminRoomController::class,'edit'])->name('admin_room_edit')->middleware('admin:admin');
Route::post('/admin/room/update/{id}',[AdminRoomController::class,'update'])->name('admin_room_update')->middleware('admin:admin');
Route::get('/admin/room/delete/{id}',[AdminRoomController::class,'delete'])->name('admin_room_delete')->middleware('admin:admin');

Route::get('/admin/orders/view',[AdminOrderController::class,'view'])->name('admin_orders_view')->middleware('admin:admin');
Route::get('/admin/orders/approve/{id}',[AdminOrderController::class,'approve'])->name('admin_order_approve')->middleware('admin:admin');
Route::get('/admin/orders/edit/{id}',[AdminOrderController::class,'edit'])->name('admin_order_edit')->middleware('admin:admin');
Route::get('/admin/order/delete/{id}',[AdminOrderController::class,'delete'])->name('admin_order_delete')->middleware('admin:admin');

Route::get('/admin/availability/view',[AdminRoomAvailability::class,'index'])->name('admin_availability_view')->middleware('admin:admin');
Route::post('/admin/availability/store',[AdminRoomAvailability::class,'store'])->name('admin_availability_store')->middleware('admin:admin');

