<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReviewController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProductReviewController;
use App\Http\Controllers\User\StripeController;

use App\Http\Controllers\Fontend\IndexController;
use App\Http\Controllers\Fontend\LanguageController;
use App\Http\Controllers\Fontend\CartController;
use App\Http\Controllers\Fontend\TrackingController;
use App\Http\Controllers\Fontend\SearchController;
use App\Http\Controllers\Fontend\ShopPageController;

use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//*********** Login with Facebook and Google **************//
//Google
Route::get('login/google', [LoginController::class, 'redirectToGoole'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGooleCallback']);

//Facebook
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);


//*********** Fontend Routes **************//
Route::get('/', [IndexController::class, 'index'])->name('/');
//Language Setup
Route::get('language/bangla',[LanguageController::class,'bangla'])->name('bangla.language');
Route::get('language/english',[LanguageController::class,'english'])->name('english.language');

// Product Details
Route::get('single-product/{id}/{slug}', [IndexController::class, 'singleProduct']);

//product tags
Route::get('product/tag/{tag}',[IndexController::class,'tagWiseProduct']);
Route::get('sub-category/product/{id}/{slug}',[IndexController::class,'subCatWiseProduct']);
Route::get('sub/sub-category/product/{id}/{slug}',[IndexController::class,'subSubCatWiseProduct']);

// Modal View for Add to cart
Route::get('product/view/modal/{id}',[IndexController::class,'viewModalProduct']);

//Add To Cart Without login
Route::post('cart/data/store/{id}',[CartController::class,'addToCart']);

//Mini Cart Without login
Route::get('product/mini/cart',[CartController::class,'miniCart']);
Route::get('/mini/cart/remove/{rowId}',[CartController::class,'miniCartRemove']);

//Add Wishlist before login 
Route::post('add-to-wishlist/{product_id}',[CartController::class,'addToWishlist']);

 //Cart Page 
Route::get('/my-cart',[CartController::class,'index'])->name('user.cart');
Route::get('/cart/product',[CartController::class,'cartProduct']);
Route::get('/cart/remove/{rowId}',[CartController::class,'cartRemove']);
Route::get('/cart/increment/{rowId}',[CartController::class,'cartIncrement']);
Route::get('/cart/decrement/{rowId}',[CartController::class,'cartDecrement']);

//checkout
Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

 //Coupon System 
Route::post('/coupon-apply',[CartController::class,'couponApply']);
Route::get('/coupon-calculation',[CartController::class,'couponCalculation']);
Route::get('/remove-coupon',[CartController::class,'removeCoupon']);

// Order Tracking System
Route::get('order-track',[TrackingController::class,'orderTrack'])->name('order.track');

// Search Product
Route::get('search-product',[SearchController::class,'searchProduct'])->name('search.product');
Route::post('product/search/auto-complete',[SearchController::class,'searchAutoCompleteProduct']);

//Shop Page 
Route::get('shop',[ShopPageController::class,'shopPage'])->name('shop');
Route::post('shop',[ShopPageController::class,'shopFilter'])->name('shop.filter');

//*********** Admin Route **************//
Route::group(['prefix'=>'admin','middleware'=>['admin','auth']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::put('update-profile',[AdminController::class,'updateProfile'])->name('admin.profile.update');
    Route::get('load-image',[AdminController::class,'loadImage'])->name('admin.load-image');
    Route::put('update-image',[AdminController::class,'updateImage'])->name('admin.update-image');
    Route::get('update-password',[AdminController::class,'loadPassword'])->name('admin.update-password');
    Route::put('store-password',[AdminController::class,'updatePassword'])->name('admin.store-password');

    //User List
    Route::get('user-list',[AdminController::class,'userList'])->name('admin.user-list');
    Route::get('user-banned/{user_id}',[AdminController::class,'userBanned'])->name('admin.user-banned');
    Route::get('user-unbanned/{user_id}',[AdminController::class,'userUnbanned'])->name('admin.user-unbanned');

    //Slider
    Route::get('slider',[SliderController::class,'index'])->name('admin.slider.index');
    Route::post('slider-store',[SliderController::class,'store'])->name('admin.slider.store');
    Route::get('slider-edit/{id}',[SliderController::class,'edit'])->name('admin.slider.edit');
    Route::put('slider-update/{id}',[SliderController::class,'update'])->name('admin.slider.update');
    Route::get('slider-destroy/{id}',[SliderController::class,'destroy'])->name('admin.slider.destroy');
    Route::get('slider-active/{id}',[SliderController::class,'active'])->name('admin.slider.active');
    Route::get('slider-inactive/{id}',[SliderController::class,'inactive'])->name('admin.slider.inactive');
    // Brand
    Route::get('brand',[BrandController::class,'index'])->name('admin.brand.index');
    Route::post('brand-store',[BrandController::class,'store'])->name('admin.brand.store');
    Route::get('brand-edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
    Route::put('brand-update/{id}',[BrandController::class,'update'])->name('admin.brand.update');
    Route::get('brand-destroy/{id}',[BrandController::class,'destroy'])->name('admin.brand.destroy');
    
    //Writer
    Route::get('all-writer',[WriterController::class,'index'])->name('admin.writer.index');
    Route::get('add-writer',[WriterController::class,'create'])->name('admin.writer.create');
    Route::post('store-writer',[WriterController::class,'store'])->name('admin.writer.store');
    Route::get('edit-writer/{id}',[WriterController::class,'edit'])->name('admin.writer.edit');
    Route::post('update-writer/{id}',[WriterController::class,'update'])->name('admin.writer.update');
    Route::get('destroy-writer/{id}',[WriterController::class,'destroy'])->name('admin.writer.destroy');
    Route::get('writer-active/{id}',[WriterController::class,'active'])->name('admin.writer.active');
    Route::get('writer-inactive/{id}',[WriterController::class,'inactive'])->name('admin.writer.inactive');

    // Category
    Route::get('category',[CategoryController::class,'index'])->name('admin.category.index');
    Route::post('category-store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('category-edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::put('category-update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('category-destroy/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

    // Sub Category
    Route::get('sub-category',[SubCategoryController::class,'index'])->name('admin.sub-category.index');
    Route::post('sub-category-store',[SubCategoryController::class,'store'])->name('admin.sub-category.store');
    Route::get('sub-category-edit/{id}',[SubCategoryController::class,'edit'])->name('admin.sub-category.edit');
    Route::put('sub-category-update/{id}',[SubCategoryController::class,'update'])->name('admin.sub-category.update');
    Route::get('sub-category-destroy/{id}',[SubCategoryController::class,'destroy'])->name('admin.sub-category.destroy');

    // Sub Sub Category
    Route::get('sub-sub-category',[SubSubCategoryController::class,'index'])->name('admin.sub-sub-category.index');
    Route::get('sub-category-ajax/{id}',[SubSubCategoryController::class,'getSubcategory']);
    Route::get('sub-sub-category-ajax/{id}',[SubSubCategoryController::class,'getSubSubcategory']);
    Route::post('sub-sub-category-store',[SubSubCategoryController::class,'store'])->name('admin.sub-sub-category.store');
    Route::get('sub-sub-category-edit/{id}',[SubSubCategoryController::class,'edit'])->name('admin.sub-sub-category.edit');
    Route::put('sub-sub-category-update/{id}',[SubSubCategoryController::class,'update'])->name('admin.sub-sub-category.update');
    Route::get('sub-sub-category-destroy/{id}',[SubSubCategoryController::class,'destroy'])->name('admin.sub-sub-category.destroy');

    // Product
    Route::get('all-product',[ProductController::class,'index'])->name('admin.product.index');
    Route::get('add-product',[ProductController::class,'create'])->name('admin.product.create');
    Route::post('store-product',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('edit-product/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::get('show-product/{id}',[ProductController::class,'show'])->name('admin.product.show');
    Route::post('update-product/{id}',[ProductController::class,'update'])->name('admin.product.update');
    Route::post('update-product-thumbnail/{id}',[ProductController::class,'updateThumbnail'])->name('admin.product.thumbnail.update');
    Route::post('update-product-image/{id}',[ProductController::class,'updateImage'])->name('admin.product.image.update');
    Route::get('delete-product-image/{id}',[ProductController::class,'deleteImage'])->name('admin.product.image.delete');
    Route::post('update-add-product-image',[ProductController::class,'addProductImage'])->name('admin.product.image.add');
    Route::get('destroy-product/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
    Route::get('product-active/{id}',[ProductController::class,'active'])->name('admin.product.active');
    Route::get('product-inactive/{id}',[ProductController::class,'inactive'])->name('admin.product.inactive');

    // Coupon
    Route::get('coupon',[CouponController::class,'index'])->name('admin.coupon.index');
    Route::post('coupon/store',[CouponController::class,'store'])->name('admin.coupon.store');
    Route::get('coupon-edit/{id}',[CouponController::class,'edit'])->name('admin.coupon.edit');
    Route::put('coupon-update/{id}',[CouponController::class,'update'])->name('admin.coupon.update');
    Route::get('coupon-destroy/{id}',[CouponController::class,'destroy'])->name('admin.coupon.destroy');

    // Shiping Area
    // Division
    Route::get('division',[DivisionController::class,'index'])->name('admin.division.index');
    Route::post('division-store',[DivisionController::class,'store'])->name('admin.division.store');
    Route::get('division-edit/{id}',[DivisionController::class,'edit'])->name('admin.division.edit');
    Route::put('division-update/{id}',[DivisionController::class,'update'])->name('admin.division.update');
    Route::get('division-destroy/{id}',[DivisionController::class,'destroy'])->name('admin.division.destroy');
    Route::get('division-active/{id}',[DivisionController::class,'active'])->name('admin.division.active');
    Route::get('division-inactive/{id}',[DivisionController::class,'inactive'])->name('admin.division.inactive');

    // District
    Route::get('district',[DistrictController::class,'index'])->name('admin.district.index');
    Route::post('district-store',[DistrictController::class,'store'])->name('admin.district.store');
    Route::get('district-edit/{id}',[DistrictController::class,'edit'])->name('admin.district.edit');
    Route::put('district-update/{id}',[DistrictController::class,'update'])->name('admin.district.update');
    Route::get('district-destroy/{id}',[DistrictController::class,'destroy'])->name('admin.district.destroy');
    Route::get('district-active/{id}',[DistrictController::class,'active'])->name('admin.district.active');
    Route::get('district-inactive/{id}',[DistrictController::class,'inactive'])->name('admin.district.inactive');

    // State
    Route::get('state',[StateController::class,'index'])->name('admin.state.index');
    Route::post('state-store',[StateController::class,'store'])->name('admin.state.store');
    Route::get('state-edit/{id}',[StateController::class,'edit'])->name('admin.state.edit');
    Route::put('state-update/{id}',[StateController::class,'update'])->name('admin.state.update');
    Route::get('state-destroy/{id}',[StateController::class,'destroy'])->name('admin.state.destroy');
    Route::get('district-ajax/{id}',[StateController::class,'getDistrict']);

    //Order
    Route::get('pending-order',[OrderController::class,'pendingOrder'])->name('admin.pending.order');
    Route::get('confirm-order',[OrderController::class,'confirmOrder'])->name('admin.confirm.order');
    Route::get('processing-order',[OrderController::class,'processingOrder'])->name('admin.processing.order');
    Route::get('picked-order',[OrderController::class,'pickedOrder'])->name('admin.picked.order');
    Route::get('shipped-order',[OrderController::class,'shippedOrder'])->name('admin.shipped.order');
    Route::get('deliver-order',[OrderController::class,'deliverOrder'])->name('admin.deliver.order');
    Route::get('cancel-order',[OrderController::class,'cancelOrder'])->name('admin.cancel.order');
    Route::get('view-order/{id}',[OrderController::class,'viewOrder'])->name('admin.view-order');
    //Admin Order Invoice Download
    Route::get('invoice-download/{id}',[OrderController::class,'invoiceDownload'])->name('admin.invoice-download');

    //Update Order Status
    Route::get('pending-to-confirm/{id}',[OrderController::class,'pendingToConfirm'])->name('admin.pending-to-confirm');
    Route::get('pending-to-cancel/{id}',[OrderController::class,'pendingToCancel'])->name('admin.pending-to-cancel');
    Route::get('confirm-to-processing/{id}',[OrderController::class,'confirmToProcessing'])->name('admin.confirm-to-processing');
    Route::get('processing-to-picked/{id}',[OrderController::class,'processingToPicked'])->name('admin.processing-to-picked');
    Route::get('picked-to-shipped/{id}',[OrderController::class,'pickedToShipped'])->name('admin.picked-to-shipped');
    Route::get('shipped-to-deliver/{id}',[OrderController::class,'shippedToDeliver'])->name('admin.shipped-to-deliver');

    //Report
    Route::get('order-report',[ReportController::class,'index'])->name('admin.report');
    Route::get('order-date',[ReportController::class,'orderByDate'])->name('admin.order-date');
    Route::get('order-month',[ReportController::class,'orderByMonth'])->name('admin.order-month');
    Route::get('order-year',[ReportController::class,'orderByYear'])->name('admin.order-year');

    //Review
    Route::get('product-review',[ReviewController::class,'reviewList'])->name('admin.review');
    Route::get('review-destroy/{id}',[ReviewController::class,'destroy'])->name('admin.review.destroy');
    Route::get('review-approve/{id}',[ReviewController::class,'reviewApprove'])->name('admin.review.approve');
    Route::get('review-pending/{id}',[ReviewController::class,'reviewPending'])->name('admin.review.pending');



});

//*********** User Route **************//
Route::group(['prefix'=>'user','middleware'=>['user','auth']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::put('update-profile',[UserController::class,'update'])->name('user.update-profile');
    Route::get('load-image',[UserController::class,'loadImage'])->name('user.load-image');
    Route::put('update-image',[UserController::class,'updateImage'])->name('user.update-image');
    Route::get('update-password',[UserController::class,'loadPassword'])->name('user.update-password');
    Route::put('store-password',[UserController::class,'updatePassword'])->name('user.store-password');
    //Wishlist Page with login
    Route::get('wishlist',[WishlistController::class,'index'])->name('user.wishlist');
    Route::get('/get/wishlist/product',[WishlistController::class,'getWishlist']);
    Route::get('/wishlist/remove/{id}',[WishlistController::class,'removeWishlist']);
    //Checkout
    Route::get('/district-ajax/{division_id}',[CheckoutController::class,'getDistrict']);
    Route::get('/state-ajax/{state_id}',[CheckoutController::class,'getState']);
    //Payment
    Route::post('payment',[CheckoutController::class,'checkoutStore'])->name('user.checkout.store');
    Route::post('stripe/payment',[StripeController::class,'store'])->name('user.stripe.order');

    // ================ Order ================
    Route::get('order',[UserController::class,'ordersList'])->name('user.my-order');
    Route::get('view-order/{id}',[UserController::class,'orderView'])->name('user.view-order');
    Route::get('order-invoice/{id}',[UserController::class,'invoiceDownload'])->name('user.order-invoice');
    // ================ Return Order ================
    Route::post('send-return-order/{id}',[UserController::class,'sendReturnOrder'])->name('user.send-return-order');
    Route::get('return-order',[UserController::class,'returnOrder'])->name('user.return-order');
    Route::get('cancel-order',[UserController::class,'cancelOrder'])->name('user.cancel-order');

    // ================ Write Product Review ================
    Route::get('review-create/{product_id}',[ProductReviewController::class,'reviewCreate']);
    Route::post('review-store',[ProductReviewController::class,'reviewStore'])->name('user.review.store');
});


// SSLCOMMERZ Start
Route::group(['middleware'=>['user','auth']],function(){
    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
// SSLCOMMERZ END


