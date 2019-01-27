<?php

#----Home Route----
Route::get('/', function () {
    return view('home');
});

#----More detailed Routes----
Route::get('product/{ProductNr}', function ($ProductNr) {
    $data = array(
        'Id' => $ProductNr
    );
    return view('product', $data);
});


#----Standard Page Routes----

Route::get('over_ons', array('as' => 'about', function () {
    return view('about');
}));

Route::get('winkel', array('as' => 'winkel', function () {
    return view('webshop');
}));

//Route::get('winkelwagen', array('as' => 'winkelwagen', function () {
//   return view('winkelwagen');
//}));

/*Route::get('payment', array('as' => 'payment', function () {
    return view('payment');
}));*/

Route::get('cms', array('as' => 'cms_home', function () {
    return view('cms.cms_home');
}));

#----CMS Routes----
#------Header CMS------
Route::get('cms/header', ['as' => 'cms_header', 'uses' => 'HeaderNavigationController@create']);

Route::post('cms/header', ['as' => 'cms_header_store', 'uses' => 'HeaderNavigationController@store']);

Route::get('cms/categories', ['as' => 'cms_categories', 'uses' => 'CategoryController@create']);

Route::post('cms/categories', ['as' => 'cms_categories_store', 'uses' => 'CategoryController@store']);

Route::post('cms/categories_add', ['as' => 'cms_categories_add', 'uses' => 'CategoryController@addCategory']);

#------Product CMS------
Route::get('cms/productbewerker/{ProductId}', array('as' => 'product_editor', function ($ProductId) {
    $data = array(
        'Id' => $ProductId
    );
    return view('cms.cms_edit_product', $data);
}));

Route::get('cms/nieuw_product', array('as' => 'product_creator', function () {
    return view('cms.cms_new_product');
}));

Route::get('cms/product_lijst', array('as' => 'cms_product_list', function () {
    return view('cms.cms_product_list');
}));

Route::post('cms/cmsCreateProduct', array('as' => 'create_product', 'uses' => 'ProductController@newProduct'));
Route::post('cms/productbewerker/cmsCreateProduct', array('as' => 'edit_product', 'uses' => 'ProductController@editProduct'));

Route::get('cms/verwijderProduct/{id}', ['uses' => 'ProductController@removeItem']);
Route::post('cms/proudctImageUpload',array('as' => 'productImageUpload', 'uses' => 'ProductController@upload'));

#----Login & Register Routes----
Auth::routes();

Route::get('/home', 'HomeController@index');
#----Shoppingcart Routes----
Route::get('/winkelwagen', array('as' => 'winkelwagen', 'uses' => 'WinkelwagenController@index'));
Route::post('/AddToCart', array('as' => 'AddToCart', 'uses' => 'WinkelwagenController@AddToCart'));
Route::post('/EditItem/{key}', array('as' => 'EditItem', 'uses' => 'WinkelwagenController@EditItem'));
Route::get('/winkelmandje/{key}', array('as' => 'RemoveItem','uses' => 'WinkelwagenController@RemoveItem'));
Route::post('/payment', array('as' => 'PurchaseItems','uses' => 'WinkelwagenController@PurchaseItems'));