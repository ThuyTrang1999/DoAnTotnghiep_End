<?php

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
// register client
Route::get('dang-ky', 'CustomerController@dangKy')->name('dang-ky');
Route::post('dang-ky', 'CustomerController@xuLyDangKy')->name('xu-ly-dang-ky');
// login client
Route::get('dang-nhap', 'CustomerController@dangNhapClient')->name('dang-nhap-client');
Route::post('dang-nhap', 'CustomerController@xuLyDangNhapClient')->name('xu-ly-dang-nhap-client');
Route::get('dang-xuat-client', 'CustomerController@dangXuatClient')->name('dang-xuat-client');

Route::get('/', 'PagesController@index')->name('client.index');

//LOGIN
Route::get('test', 'UserController@layThongTin');

Route::middleware(['guest'])->group(function () {
    Route::get('login', 'UserController@dangNhap')->name('dang-nhap');
    Route::post('login', 'UserController@xuLyDangNhap')->name('xu-ly-dang-nhap');
    // Forgot password admin
    Route::get('quen-mat-khau', 'UserController@quenMatKhau')->name('quen-mat-khau');
    Route::post('verify-email', 'UserController@verifyEmail')->name('verify-email');
    Route::get('khoi-phuc-mat-khau/{token}', 'UserController@getResetPass');
    Route::post('reset-pass', 'UserController@postResetPass')->name('reset-password');


    // Forgot password client
    Route::get('quen-mat-khau-client', 'CustomerController@quenMatKhau')->name('quen-mat-khau-client');
    Route::post('verify-email-client', 'CustomerController@verifyEmail')->name('verify-email-client');
    Route::get('khoi-phuc-mat-khau-client/{token}', 'CustomerController@getResetPassClient');
    Route::post('reset-pass-client', 'CustomerController@postResetPass')->name('reset-password-client');
});


Route::middleware(['auth'])->group(function () {
    Route::get('dang-xuat', 'UserController@dangXuat')->name('dang-xuat');


    // ADMIN
    Route::get('/admin', function () {
        return view('admin.pages.index');
    })->name('admin.index');

    // group admin
    Route::prefix('admin')->group(function(){
        Route::name('admin.')->group(function(){
            Route::get('/add-statistical', function () {
                return view('admin.pages.statistical.add-statistical');
            })->name('add-statistical');

            Route::get('/list-statistical', function () {
                return view('admin.pages.statistical.list-statistical');
            })->name('list-statistical');

            // setting
            Route::get('/setting', function () {
                return view('admin.pages.setting.setting');
            })->name('setting');

        });
    });

    // user
    Route::prefix('user')->group(function(){
        Route::name('user.')->group(function(){
            Route::get('/','UserController@index')->name('listUser')->middleware('auth');
            Route::get('add-User','UserController@create')->name('them-moi');
            Route::post('add-User/create','UserController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}','UserController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}','UserController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'UserController@destroy')->name('xoa');
            Route::get('profile/{id}', 'UserController@profile')->name('Editprofile');
            Route::post('profile/{id}', 'UserController@profileEdit')->name('Edit-profile-admin');
        });
    });

    //  
    Route::prefix('vendor')->group(function(){
        Route::name('vendor.')->group(function(){
            Route::get('/','VendorController@index')->name('listVendor');
            Route::get('add-vendor','VendorController@create')->name('them-moi-vendor');
            Route::post('add-vendor/create','VendorController@store')->name('xu-ly-them-moi-vendor');
            Route::get('cap-nhat/{id}','VendorController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}','VendorController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'VendorController@destroy')->name('xoa');
        });
    });


    // category
    Route::prefix('category')->group(function(){
        Route::name('category.')->group(function(){
            Route::get('/','CategoryController@index')->name('listCategory');
            Route::get('add-category','CategoryController@create')->name('them-moi');
            Route::post('add-category/create','CategoryController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}','CategoryController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}','CategoryController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'CategoryController@destroy')->name('xoa');
        });
    });
    // Route::get('/','ProduceController@filter')->name('filter');
    //produce
    Route::prefix('product')->group(function(){
        Route::name('product.')->group(function(){
            Route::get('/','ProduceController@index')->name('listProduct');
            Route::get('add-product','ProduceController@create')->name('them-moi');
            Route::post('add-product/create','ProduceController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}','ProduceController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}','ProduceController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'ProduceController@destroy')->name('xoa');
          
            
        });
    });
    // brand
    Route::prefix('brand')->group(function(){
        Route::name('brand.')->group(function(){
            Route::get('/','BrandController@index')->name('listBrand');
            Route::get('add-brand','BrandController@create')->name('them-moi');
            Route::post('add-brand/create','BrandController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhap/{id}','BrandController@edit')->name('cap-nhat');
            Route::post('cap-nhap/{id}','BrandController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'BrandController@destroy')->name('xoa');
        });
    });

    // bill
    Route::prefix('bill')->group(function(){
        Route::name('bill.')->group(function(){
            Route::get('/','BillController@index')->name('listbill');
            Route::get('cap-nhap/{id}','BillController@edit')->name('cap-nhat');
            Route::post('cap-nhap/{id}','BillController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'BillController@destroy')->name('xoa');
        });
    });


    // customer

    Route::prefix('customer')->group(function(){
        Route::name('customer.')->group(function(){
            Route::get('/', 'CustomerController@index')->name('listCustomer')->middleware('auth');
            Route::get('add-customer','CustomerController@create')->name('them-moi-customer');
            Route::post('add-sub_category/create','CustomerController@store')->name('xu-ly-them-moi');
        });
    });

    // user
    Route::prefix('post')->group(function(){
        Route::name('post.')->group(function(){
            Route::get('/','PostController@index')->name('listPost');
            Route::get('add-post','PostController@create')->name('them-moi-post');
            Route::post('add-post/create','PostController@store')->name('xu-ly-them-moi');
            Route::get('cap-nhat/{id}','PostController@edit')->name('cap-nhat');
            Route::post('cap-nhat/{id}','PostController@update')->name('xu-ly-cap-nhat');
            Route::get('xoa/{id}', 'PostController@destroy')->name('xoa');
        });
    });
});

Route::prefix('thongke')->group(function(){
    Route::name('thongke.')->group(function(){
        Route::get('/','ThongkeController@danhthu')->name('danhthu');
        
    });
});
// shop product
Route::prefix('shopProduct')->group(function(){
    Route::name('shopProduct.')->group(function(){
        Route::get('/','ShopProductController@index')->name('listShopProduct');
        Route::get('add-shop-product','ShopProductController@create')->name('them-moi-shop-product');
        Route::get('hinhchitiet/{id}','ShopProductController@hinhchitiet')->name('hinhchitiet');
        Route::post('add-shop-product/create','ShopProductController@store')->name('xu-ly-them-moi');
        Route::get('cap-nhat/{id}','ShopProductController@edit')->name('cap-nhat');
        Route::post('cap-nhat/{id}','ShopProductController@update')->name('xu-ly-cap-nhat');
        Route::get('xoa/{id}', 'ShopProductController@destroy')->name('xoa');
    });
});

// CLIENT
//profile customer
Route::get('profileClient/{id}', 'CustomerController@profileClient')->name('EditprofileClient');
Route::post('profileClient/{id}', 'CustomerController@profileEditClient')->name('xu-ly-cap-nhat');

// kenh nguoi ban
Route::get('/kenh-cua-ban', 'ShopPagesController@index')->name('client.seller');
Route::get('/kiem-tra-tai-khoan', 'PagesController@checkAccount')->name('check-account');
Route::get('/mo-cua-hang', 'PagesController@openStore')->name('open-store');
Route::get('/xu-ly', 'PagesController@createStore')->name('create-store');
Route::get('/cua-hang/id','ShopPagesController@show')->name('cua-hang');

// group shop
Route::prefix('shop')->group(function(){
    Route::name('shop.')->group(function(){
        Route::get('/adver', function () {
            return view('shop.pages.adver');
        })->name('adver');
        
        Route::get('/bill', function () {
            return view('shop.pages.bill');
        })->name('bill');

        Route::get('/report', function () {
            return view('shop.pages.shop_mana.report');
        })->name('report');
        Route::get('/review', function () {
            return view('shop.pages.shop_mana.review');
        })->name('review');
        Route::get('/setting', function () {
            return view('shop.pages.shop_mana.setting_shop');
        })->name('setting_shop');
        Route::get('/update-shop', function () {
            return view('shop.pages.shop_mana.update-shop');
        })->name('update-shop');
        Route::get('/update-user', function () {
            return view('shop.pages.shop_mana.update-user');
        })->name('update-user');
    });
});

Route::get('/cua-hang','ShopPagesController@show')->name('cua-hang');


Route::get('/gioi-thieu','PagesController@about')->name('about');

Route::get('/lien-he','PagesController@contact')->name('contact');

Route::get('/danh-sach-san-pham','ProduceController@select')->name('client.list-product');

// 404
Route::get('/404', function () {
    return view('client.pages.404');
})->name('client.404');

// Detail
Route::get('/detail/id','ProduceController@detail' )->name('client.detail');
Route::get('/modal/id','ProduceController@detailModal' )->name('modalshow');

// Rating
Route::post('/detail/rating','ProduceController@rating' )->name('client.rating');

// cart
Route::get('/gio-hang','PagesController@ShowCart' )->name('show_cart');
Route::get('/them-san-pham/{id}','PagesController@AddCart' )->name('add_cart');
Route::get('/cap-nhat-san-pham/{id}','PagesController@UpdateCart' )->name('update_cart');
Route::get('/xoa-san-pham/{id}','PagesController@DeleteCart' )->name('delete_cart');

// search
Route::get('/search','PagesController@getSearch' )->name('search');
Route::get('/ket-qua-tim-kiem','PagesController@getSearchResult' )->name('searchResult');

// Thanh toan
Route::get('/thanh-toan','BillController@postCheckout' )->name('checkout');
Route::post('/luu-gio-hang','BillController@saveCheckoutCustommer' )->name('save_checkout_custommer');
Route::post('/dat-hang',['as'=>'dathang','uses'=>'PagesController@postCheckout']);
    
// San Pham yeu thich
Route::get('/san-phan-yeu-thich/{id}','WishlistController@addWishlist' )->name('wishlist');

Route::match(['get','post'],'/filter/product','ProduceController@filterProduct' )->name('product_filter');