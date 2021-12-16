<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin/login', 'admin\AdminController@login');
Route::post('/admin/login', 'admin\AdminController@loginCheck');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'admin'], function () {

//    Route::group([ 'prefix' => 'admin', 'namespace' => 'admin'], function () {
    Route::get('/', 'AdminController@login');


    Route::get('/dashboard', 'DashboardController@index');


//=============================  product route  ==========================

    Route::get('/products', 'ProductController@index');
    Route::post('/product-urlcheck', 'ProductController@urlCheck')->name('product.urlcheck');
 
    Route::get('/product/create', 'ProductController@create');
    Route::post('/product/store', 'ProductController@store');
    Route::post('/product/update/{id}', 'ProductController@update');
    Route::get('/productEdit/{id}', 'ProductController@edit');
    Route::get('/product/delete/{id}', 'ProductController@destroy');
    Route::get('products/pagination', 'ProductController@pagination');
    Route::get('/top-deal-products', 'ProductController@TopDealProducts');
    Route::get('/unpublishedProduct', 'ProductController@unpublishedProduct');
    Route::get('/getSubCategoryForProduct/{id}', 'ProductController@getSubCategoryForProduct');
    Route::get('/getProductDetailMediaFile', 'ProductController@getProductDetailMediaFile');
    Route::post('/productDetailImageUpload', 'ProductController@productDetailImageUpload');
    Route::get('/productDetailMediaDelete/{id}', 'ProductController@productDetailMediaDelete');
    Route::get('/productLocationChanged', 'ProductController@productLocationChanged');

    /****=============== brand section    =====================******/
    Route::get('/brand', 'BrandController@index'); 
    Route::get('brand/create', 'BrandController@create');
    Route::post('brand/store', 'BrandController@store');
    Route::post('/brand/update/{id}', 'BrandController@update');
    Route::get('/brand/{id}', 'BrandController@edit');
    Route::get('/brand/delete/{id}', 'BrandController@delete');

    /****=============== category section    =====================  ******/
    Route::get('/categories', 'CategoryController@index');
    Route::post('category-urlcheck', 'CategoryController@urlCheck');
    Route::get('category/create', 'CategoryController@create');
    Route::post('category/store', 'CategoryController@store');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/category/{id}', 'CategoryController@edit');
    Route::get('/category/delete/{id}', 'CategoryController@delete');
    Route::get('category/pagination/fetch_data', 'CategoryController@fetch_data');

    /****=============== Order section    =====================  ******/
    Route::get('admin/orders', 'admin\OrderController@index');
    Route::get('admin/orders/history-generate', 'admin\OrderController@orderHistoryGenerate');
    Route::get('admin/order/create', 'admin\OrderController@create');
    Route::post('admin/order/store', 'admin\OrderController@store');
    Route::post('admin/order/update/{id}', 'admin\OrderController@update');
    Route::get('/admin/order/delete/{id}', 'admin\OrderController@destroy');
    Route::get('admin/order/invoice-print/{id}', 'admin\OrderController@invoicePrint');
    Route::get('order/pagination', 'admin\OrderController@pagination');
    Route::get('order/pagination_by_search', 'admin\OrderController@pagination_by_search');
    Route::get('order/pagination_search_by_phone', 'admin\OrderController@pagination_search_by_phone');
    Route::get('order/pagination_search_by_affiliate_id', 'admin\OrderController@pagination_search_by_affiliate_id');
    Route::get('order/pagination_search_by_product_code', 'admin\OrderController@pagination_search_by_product_code');
    Route::get('/orderConvertToProductCode', 'admin\OrderController@orderConvertToProductCode');


    /****=============== admin page section    =====================  ******/
    Route::get('/pages', 'PageController@index');
    Route::get('/page/create', 'PageController@create');
    Route::post('/page/store', 'PageController@store');
    Route::post('/page/update/{id}', 'PageController@update');
    Route::get('/page/{id}', 'PageController@edit');
    Route::get('/page/delete/{id}', 'PageController@delete');

    /****=============== Order section    =====================  ******/
    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/history-generate', 'OrderController@orderHistoryGenerate');
    Route::get('/order/create', 'OrderController@create');
    Route::post('/order/store', 'OrderController@store');
    Route::post('/order/update/{id}', 'OrderController@update');
    Route::get('/order/delete/{id}', 'OrderController@destroy');
    Route::get('/order/invoice-print/{id}', 'OrderController@invoicePrint');
    Route::get('order/pagination', 'OrderController@pagination');
    Route::get('order/pagination_by_search', 'OrderController@pagination_by_search');
    Route::get('order/pagination_search_by_phone', 'OrderController@pagination_search_by_phone');
    Route::get('order/pagination_search_by_affiliate_id', 'OrderController@pagination_search_by_affiliate_id');
    Route::get('order/pagination_search_by_product_code', 'OrderController@pagination_search_by_product_code');
    Route::get('/orderConvertToProductCode', 'OrderController@orderConvertToProductCode');

    Route::post('order/product/selection/change', 'AjaxOrderControlller@productSelectionChange')->name('productSelectionChange');
    Route::post('order/product/selection', 'AjaxOrderControlller@productSelection')->name('productSelection');
    Route::post('new/order/product/selection', 'AjaxOrderControlller@newProductSelection')->name('newProductSelectionChange');
    Route::post('newProductUpdate/order/product/selection', 'AjaxOrderControlller@newProductUpdate')->name('newProductUpdateChange');
    Route::get('/courier/view/report', 'OrderController@courierViewReport');
    Route::get('/courier/view/report/pagination', 'OrderController@courierViewReportPagination');
    Route::get('/orderEditHistory/{id}', 'OrderController@orderEditHistory');
    Route::get('/orderModalPrint/{id}', 'OrderController@orderModalPrint');
    Route::get('/order/report', 'OrderController@orderReport');
    Route::post('order/report', 'OrderController@orderReportGeneration');
    Route::get('order/status/changed/{order_status}/{order_id}', 'OrderController@statusChanged');
    Route::get('order/{id}', 'OrderController@edit');


    /****=============== admin section    =====================  ******/

    Route::get('/users', 'AdminController@index');
    Route::get('/generel/users', 'AdminController@generel_users');
    Route::get('/generel/message', 'AdminController@message');
    Route::get('/questions', 'AdminController@questions');
    Route::get('/product/comment/{id}', 'AdminController@productComment');
    Route::post('/commentUpdate/{id}', 'AdminController@commentUpdate');
    Route::get('/generel/message/show/{id}', 'AdminController@messageShow');
    Route::get('/generel/message/notificationCount', 'AdminController@notificationCount');
    Route::get('/generel/message/pagination', 'AdminController@message_pagination');
    Route::post('/generel/messageDelete', 'AdminController@messageDelete');
    Route::get('generel/users/pagination', 'AdminController@general_pagination');

    Route::get('user/create', 'AdminController@create');
    Route::post('user/store', 'AdminController@store');
    Route::post('user/update/{id}', 'AdminController@update');
    Route::get('user/{id}', 'AdminController@edit');
    Route::get('vendor/{id}', 'AdminController@editVendorProfile');
    Route::get('/user/delete/{id}', 'AdminController@delete');
    Route::get('logout', 'AdminController@logout');
    // =================advertisment===================
    Route::resource('advertisement', 'AdvertisementController');
    Route::get('/advertisement/destroy/{id}', 'AdvertisementController@destroy');
// ================testmonial====================
Route::resource('testmonial', 'TestmonialController');
Route::get('/testmonial/destroy/{id}', 'TestmonialController@destroy');
    /****=============== media section    =====================  ******/
    Route::get('sliders', 'SliderController@index');
    Route::get('slider/create', 'SliderController@create');
    Route::post('slider/store', 'SliderController@store');
    Route::post('slider/update/{id}', 'SliderController@update');
    Route::get('slider/{id}', 'SliderController@edit');
    Route::get('/slider/delete/{id}', 'SliderController@destroy');

    /****=============== courier section    =====================  ******/
    Route::get('/couriers', 'CourierController@index');
    Route::get('/courier/create', 'CourierController@create');
    Route::post('/courier/store', 'CourierController@store');
    Route::post('/courier/update/{id}', 'CourierController@update');
    Route::get('/courier/{id}', 'CourierController@edit');
    Route::get('/courier/delete/{id}', 'CourierController@delete');


    /****=============== media section    =====================  ******/
    Route::get('/media', 'MediaController@index');
    Route::get('/media/create', 'MediaController@create');
    Route::post('/media/store', 'MediaController@store');
    Route::get('/media/delete/{id}', 'MediaController@destroy');
    Route::get('media/pagination', 'MediaController@pagination');
    Route::get('media/pagination/fetch_data', 'MediaController@pagination');


    /**************************** Order report          **************************/

    Route::get('report/order_report', 'ReportController@order_report');
    Route::get('limited/product', 'ReportController@limited_product');
    Route::post('report/order_report', 'ReportController@order_report_by_ajax');


    /****=============== home page setting section    =====================  ******/
    Route::get('homepage/setting', 'SettingController@homePageSetting');
    Route::post('homepage/setting', 'SettingController@homePageSetting');

    Route::get('default/setting', 'SettingController@defaultSetting');
    Route::post('default/setting', 'SettingController@defaultSetting');
    Route::get('social/setting', 'SettingController@socialSetting');
    Route::post('social/setting', 'SettingController@socialSetting');
    Route::get('default/mailSetting', 'SettingController@mailSetting');
    Route::post('social/smtpAdd', 'SettingController@smtpAdd');


    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        $data['main'] = 'Cache';
        $data['active'] = 'Cache';
        $data['title'] = '';
        return view('admin.layouts.clear_cache', $data);
    });

});


Route::namespace('fontend')->group(function () { 
    Route::get('/', 'HomeController@index');
    Route::get('/category/{id}', 'HomeController@category');
    Route::get('/testimonial', 'HomeController@testimonial');
    Route::get('/fontend/category/products', 'HomeController@ajaxCategoryClickProduct');
    Route::get('/fontend/category/productsSearch', 'HomeController@ajaxCategoryProductSearch');
    Route::get('/about', 'HomeController@about');     
    Route::get('/myoffer', 'HomeController@myoffer');
    Route::get('/takeguide', 'HomeController@takeguide');
    Route::get('/order-tracking', 'HomeController@ordertracking');
    Route::get('/contact', 'HomeController@contact');
    Route::get('/add-to-cart', 'CartController@add_to_cart');
    Route::get('/cart', 'CartController@cart');


    Route::get('/plus_cart_item', 'CartController@plus_cart_item');
    Route::get('/minus_cart_item', 'CartController@minus_cart_item');
    Route::get('/remove_cart_item', 'CartController@remove_cart_item');
    Route::get('/add-to-wishlist', 'WishlishedController@add_to_wishlist');
    Route::get('/wishlist', 'WishlishedController@wishlist');
    Route::get('/remove-to-wishlist', 'WishlishedController@remove_wish_list');

    Route::get('/add-to-compare', 'WishlishedController@add_to_compare');
    Route::get('/compare', 'WishlishedController@compare');
    Route::get('/remove_compare', 'WishlishedController@remove_compare');

    Route::get('/checkout', 'CheckOutController@checkout');
    Route::post('/chechout', 'CheckOutController@checkoutStore');
    Route::get('/thank-you', 'CheckOutController@thankYou');

    Route::get('login', 'CustomerController@login');
    Route::post('login', 'CustomerController@login_check');
    Route::get('signup', 'CustomerController@sign_up_form');
    Route::post('signup', 'CustomerController@store');
    Route::get('/customer/dasboard', 'CustomerController@dashboard');
    Route::get('/profile', 'CustomerController@profile');
    Route::post('/profile/update', 'CustomerController@profileUpdate');

    Route::get('forgotpassword', 'CustomerController@ForgotPassword');
    Route::get('otp/request/{phone}', 'CustomerController@otpRequest');


    Route::get('/all-brand', 'BrandController@index');
    Route::get('/brand/{id}', 'BrandController@brand');
    Route::get('/{id}', 'HomeController@product'); 

    
});