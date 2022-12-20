<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  
use App\Models\foods;
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
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout'); 
//Admin
Route::group(['middleware'=>'checkadmin'],function(){
    Route::get('/AdminDashboard', [App\Http\Controllers\AdminController::class, 'Main'])->name('adminDashboard');
    Route::get('/AdminDashboard/Restaurants', [App\Http\Controllers\AdminController::class, 'MainRestaurants'])->name('admin.restaurants');
    Route::get('delete/id', [App\Http\Controllers\AdminController::class, 'deleteUser']);
    Route::get('/reject/{id}', [App\Http\Controllers\AdminController::class, 'deleteResto'])->name("reject");
    Route::get('/accept/{id}', [App\Http\Controllers\AdminController::class, 'acceptResto'])->name("accept");
});


Auth::routes(); 
//User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
Route::get('/UserDashboard', [App\Http\Controllers\UserController::class, 'userhome'])->name('userDashboard');
Route::get('/menudashboard/{id}', [App\Http\Controllers\UserController::class, 'menudisplay'])->name('menudashboard');
Route::get('/categorymenu/{resid}/{catid}', [App\Http\Controllers\UserController::class, 'Categorydisplay'])->name('categorymenu');
Route::get('/reviewdashboard/{id}', [App\Http\Controllers\UserController::class, 'DisplayReview'])->name('reviewdashboard');
Route::post('/addrev/{id}', [App\Http\Controllers\UserController::class, 'AddReview'])->name('addrev');
Route::get('/UserOrders', [App\Http\Controllers\UserController::class, 'displayUserOrders'])->name('userOrders'); 
Route::post('/SearchFoodMenu', [App\Http\Controllers\UserController::class, 'searchfoodbyname'])->name('search'); 
//Cart
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart/{id}', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::get('/checkout/{id}', [App\Http\Controllers\CartController::class, 'placeorder'])->name('checkout'); 
Route::post('/PlaceOrder',[App\Http\Controllers\CartController::class, 'updateOrders'])->name('place.order');  
Route::get('/PaymentChoice', [App\Http\Controllers\CartController::class, 'paymentchoices'])->name('paymentchoices'); 

//Payment  
Route::controller(App\Http\Controllers\StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('onlinepayment');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});  


//Cook 
Route::get('/RestaurantDashboard', [App\Http\Controllers\RestaurantController::class, 'restaurantdash'])->name('restaurantDashboard'); 
Route::get('/Restaurantregister', [App\Http\Controllers\RestaurantController::class, 'registerview'])->name('restaurantregister');
Route::get('/EditRestaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'displaystoretoedit'])->name('DisplayStoreToEdit');
Route::post('/editrestaurant/{id}', [App\Http\Controllers\RestaurantController::class, 'editrestaurant'])->name('updaterestaurant');
Route::get('/DisplayFood', [App\Http\Controllers\FoodController::class, 'displayfood'])->name('displayfood'); 
Route::get('/AddFood', [App\Http\Controllers\FoodController::class, 'InsertFoods'])->name('insertfood'); 
Route::post('/InsertFood',[App\Http\Controllers\FoodController::class, 'insertfood'])->name('InsertFoods');
Route::get('/EditFood/{id}', [App\Http\Controllers\FoodController::class, 'EditFoods'])->name('DisplayFoodToEdit');
Route::post('/editfood/{id}', [App\Http\Controllers\FoodController::class, 'updatefoods'])->name('updatefood');
Route::post('/deleteFood', [App\Http\Controllers\FoodController::class, 'deletefood'])->name('deletefood');
Route::get('/DisplayOffers', [App\Http\Controllers\OffersController::class, 'displayoffer'])->name('displayoffer');  
Route::get('/AddOffer', [App\Http\Controllers\OffersController::class, 'InsertOffers'])->name('insertoffer'); 
Route::post('/InsertOffer',[App\Http\Controllers\OffersController::class, 'insertoffer'])->name('InsertOffers');
Route::get('/EditOffer/{id}', [App\Http\Controllers\OffersController::class, 'EditOffer'])->name('DisplayOfferToEdit');
Route::post('/editoffer/{id}', [App\Http\Controllers\OffersController::class, 'updateoffers'])->name('updateoffer');
Route::post('/deleteOffer', [App\Http\Controllers\OffersController::class, 'deleteoffer'])->name('deleteoffer');
Route::get('/DisplayReview', [App\Http\Controllers\ReviewsController::class, 'displayreviews'])->name('displayreviews'); 
Route::get('/DisplayOrders', [App\Http\Controllers\OrdersController::class, 'displayOrders'])->name('displayOrders');
Route::post('/deleteOrder', [App\Http\Controllers\OrdersController::class, 'deleteorder'])->name('deleteorder');
Route::get('/editOrder/{id}', [App\Http\Controllers\OrdersController::class, 'displayOrderToEdit'])->name('displayorderstoedit');  
Route::get('/UpdateOrder/{id}/{statusid}', [App\Http\Controllers\OrdersController::class, 'editorder'])->name('update.order');   
Route::get('/DisplayCategories', [App\Http\Controllers\CategoryController::class, 'categoriedash'])->name('displaycategories'); 
Route::get('/AddCategory', [App\Http\Controllers\CategoryController::class, 'Insertcategory'])->name('insertcategorie');
Route::post('/InsertCategory',[App\Http\Controllers\CategoryController::class, 'insertCategories'])->name('InsertCategory');
Route::get('/EditCategory/{id}', [App\Http\Controllers\CategoryController::class, 'EditCategory'])->name('DisplayCategoryToEdit');
Route::post('/editcategory/{id}', [App\Http\Controllers\CategoryController::class, 'updatecategorie'])->name('updatecategory');
Route::post('/deleteCategory', [App\Http\Controllers\CategoryController::class, 'deletecategorie'])->name('deletecategorie');  
