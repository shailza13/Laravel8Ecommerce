<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoupenController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth']);
Route::group(['middleware'=>'admin_auth'],function(){
		Route::get('admin/dashboard',[AdminController::class,'dashboard']);

		//CATEGORY ROUTES STARTS
		Route::get('admin/category',[CategoryController::class,'index']);
		Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
		Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category_edit']);
		Route::post('admin/category/manage_category_update',[CategoryController::class,'manage_category_update']);
		Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);
		Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
		Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.insert');
			Route::get('admin/logout', function () {
			   	session()->forget('ADMIN_LOGIN');
			    session()->forget('ADMIN_ID');
			    session()->flash('error','Logout Successfully');
			    return redirect('admin');
			});

			//	CATEGORY ROUTES ENDS

			//COUPEN ROUTES
			Route::get('admin/coupen',[CoupenController::class,'index']);
			Route::get('admin/coupen/manage_coupen',[CoupenController::class,'manage_coupen']);
			Route::post('admin/coupen/manage_coupen_process',[CoupenController::class,'manage_coupen_process'])->name('coupen.insert');
			Route::get('admin/coupen/manage_coupen/{id}',[CoupenController::class,'manage_coupen_edit']);
			Route::post('admin/coupen/manage_coupen_update',[CoupenController::class,'manage_coupen_update']);
			Route::get('admin/coupen/status/{status}/{id}',[CoupenController::class,'status']);
			Route::get('admin/coupen/delete/{id}',[CoupenController::class,'delete']);

			//COUPEN ROUTES ENDS


			//SIZE ROUTES
			Route::get('admin/size',[SizeController::class,'index']);
			Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
			Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.insert');
			Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size_edit']);
			Route::post('admin/size/manage_size_update',[SizeController::class,'manage_size_update']);
			Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
			Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
			//SIZE ROUTES ENDS

			//COLOR ROUTES
			Route::get('admin/color',[ColorController::class,'index']);
			Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
			Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.insert');
			Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color_edit']);
			Route::post('admin/color/manage_color_update',[ColorController::class,'manage_color_update']);
			Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);
			Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);
			//COLOR ROUTES ENDS

			//PRODUCT ROUTES
			Route::get('admin/product',[ProductController::class,'index']);
			Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
			Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('product.insert');
			Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product_edit']);
			Route::post('admin/product/manage_product_update',[ProductController::class,'manage_product_update']);
			Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);
			Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
			//PRODUCT ROUTES ENDS

});
// Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);
