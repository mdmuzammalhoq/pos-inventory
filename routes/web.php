<?php

Route::get('/', function () {
    return view('layouts.front.frontpages.index');
});

// Front Controllers
Route::group(['middleware' =>'auth'], function(){
	Route::prefix('suppliers')->group(function(){
		Route::get('/view', 'SupplierController@view')->name('suppliers.view');
		Route::get('/add', 'SupplierController@add')->name('suppliers.add');
		Route::post('/store', 'SupplierController@store')->name('suppliers.store');
		Route::get('/edit/{id}', 'SupplierController@edit')->name('suppliers.edit');
		Route::post('/update/{id}', 'SupplierController@update')->name('suppliers.update');
		Route::get('/delete/{id}', 'SupplierController@delete')->name('suppliers.delete');
		Route::get('/delete/{id}', 'SupplierController@delete')->name('suppliers.delete');
	});
});
 
// Fornt Pages
Route::get('/', 'front\IndexController@index')->name('/');
Route::get('/sp-products', 'front\IndexController@sp_products')->name('sp_products');
Route::get('/gp-products', 'front\IndexController@gp_products')->name('gp_products');
Route::get('/hp-products', 'front\IndexController@hp_products')->name('hp_products');
Route::get('/palce-order', 'front\IndexController@palce_order')->name('palce_order');
Route::get('/contact', 'front\IndexController@contact')->name('contact');

Route::post('/order/product', 'front\InvoiceController@OrderProduct')->name('order.product');
Route::post('/return/product', 'front\InvoiceController@ReturnProduct')->name('return.product');
Route::get('/order/approve/{id}', 'InvoiceController@OrderApprove')->name('order.approve');

// SearchRoute
Route::get('/search', 'front\SearchController@search')->name('search');

// Customer Login
Route::post('/customer-signup', 'front\CustomerLoginController@signUp')->name('customer.signup');
Route::post('/customer-login', 'front\CustomerLoginController@login');
Route::get('/customer-logout', 'front\CustomerLoginController@logout');

// Admin Controllers
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@LogOut')->name('log.out');
Route::group(['middleware' =>'auth'], function(){
	Route::prefix('suppliers')->group(function(){
		Route::get('/view', 'SupplierController@view')->name('suppliers.view');
		Route::get('/add', 'SupplierController@add')->name('suppliers.add');
		Route::post('/store', 'SupplierController@store')->name('suppliers.store');
		Route::get('/edit/{id}', 'SupplierController@edit')->name('suppliers.edit');
		Route::post('/update/{id}', 'SupplierController@update')->name('suppliers.update');
		Route::get('/delete/{id}', 'SupplierController@delete')->name('suppliers.delete');
		Route::get('/delete/{id}', 'SupplierController@delete')->name('suppliers.delete');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('customers')->group(function(){
		Route::get('/view', 'CustomerController@view')->name('customers.view');
		Route::get('/add', 'CustomerController@add')->name('customers.add');
		Route::post('/store', 'CustomerController@store')->name('customers.store');
		Route::get('/edit/{id}', 'CustomerController@edit')->name('customers.edit');
		Route::post('/update/{id}', 'CustomerController@update')->name('customers.update');
		Route::get('/delete/{id}', 'CustomerController@delete')->name('customers.delete');
		Route::get('/credit/customer', 'CustomerController@creditCustomer')->name('customers.credit');
		
		Route::get('/credit/customer/pdf', 'CustomerController@creditCustomerPDF')->name('customers.credit.pdf');
		Route::get('/edit/customer/invoice/{invoice_id}', 'CustomerController@editCustomerInvoice')->name('edit.customer.invoice');
		Route::post('/update/customer/invoice/{invoice_id}', 'CustomerController@updateCustomerInvoice')->name('customer.invoice.update');
		Route::get('/update/details/invoice/{invoice_id}', 'CustomerController@CustomerInvoiceDetalPDF')->name('customer.invoice.detail.pdf');

		Route::get('/paid/customer', 'CustomerController@paidCustomer')->name('customers.paid');
		Route::get('/paid/customer/pdf', 'CustomerController@paidCustomerPDF')->name('customers.paid.pdf');
		Route::get('/wise/customer/report', 'CustomerController@CustomerWiseReport')->name('customers.wise.report');
		Route::get('/wise/customer/credit/report', 'CustomerController@CustomerWiseCreditReport')->name('customers.wise.credit.report');
		Route::get('/wise/customer/paid/report', 'CustomerController@CustomerWisePaidReport')->name('customers.wise.paid.report');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('units')->group(function(){
		Route::get('/view', 'UnitController@view')->name('units.view');
		Route::get('/add', 'UnitController@add')->name('units.add');
		Route::post('/store', 'UnitController@store')->name('units.store');
		Route::get('/edit/{id}', 'UnitController@edit')->name('units.edit');
		Route::post('/update/{id}', 'UnitController@update')->name('units.update');
		Route::get('/delete/{id}', 'UnitController@delete')->name('units.delete');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('categories')->group(function(){
		Route::get('/view', 'CategoryController@view')->name('categories.view');
		Route::get('/add', 'CategoryController@add')->name('categories.add');
		Route::post('/store', 'CategoryController@store')->name('categories.store');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
		Route::post('/update/{id}', 'CategoryController@update')->name('categories.update');
		Route::get('/delete/{id}', 'CategoryController@delete')->name('categories.delete');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('products')->group(function(){
		Route::get('/view', 'ProductController@view')->name('products.view');
		Route::get('/add', 'ProductController@add')->name('products.add');
		Route::post('/store', 'ProductController@store')->name('products.store');
		Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
		Route::post('/update/{id}', 'ProductController@update')->name('products.update');
		Route::get('/delete/{id}', 'ProductController@delete')->name('products.delete');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('purchase')->group(function(){
		Route::get('/view', 'PurchaseController@view')->name('purchase.view');
		Route::get('/add', 'PurchaseController@add')->name('purchase.add');
		Route::post('/store', 'PurchaseController@store')->name('purchase.store');
		Route::get('/pending', 'PurchaseController@pendingList')->name('purchase.pending.list');
		Route::get('/approve/{id}', 'PurchaseController@approve')->name('purchase.approve');
		Route::get('/delete/{id}', 'PurchaseController@delete')->name('purchase.delete');
		Route::get('/purchase/report', 'PurchaseController@dailyPerchaseReport')->name('purchase.report.daily');
		Route::get('/purchase/report/pdf', 'PurchaseController@dailyPerchaseReportPDF')->name('purchase.report.daily.pdf');
	});

	Route::get('get-category', 'DefaultController@getCategory')->name('get-category');
	Route::get('get-product', 'DefaultController@getProduct')->name('get-product');
	Route::get('get-stock', 'DefaultController@getStock')->name('check-product-stock');
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('invoice')->group(function(){
		Route::get('/view', 'InvoiceController@view')->name('invoice.view');
		Route::get('/add', 'InvoiceController@add')->name('invoice.add');
		Route::post('/store', 'InvoiceController@store')->name('invoice.store');
		Route::get('/pending', 'InvoiceController@pendingList')->name('invoice.pending.list');
		Route::get('/approve/{id}', 'InvoiceController@approve')->name('invoice.approve');
		Route::get('/delete/{id}', 'InvoiceController@delete')->name('invoice.delete');
		Route::post('/approve/store/{id}', 'InvoiceController@approveStore')->name('approval.store');
		Route::get('/print/list', 'InvoiceController@printInvoiceList')->name('invoice.print.list');
		Route::get('/print/{id}', 'InvoiceController@printInvoice')->name('invoice.print');
		Route::get('/invoice/report/daily', 'InvoiceController@DailyInvoiceReport')->name('invoice.report.daily');
		Route::get('/invoice/report/daily/pdf', 'InvoiceController@DailyInvoiceReportPDF')->name('invoice.report.daily.pdf');
	});
});

Route::group(['middleware' =>'auth'], function(){
	Route::prefix('stock')->group(function(){
		Route::get('/report', 'StockController@stockReport')->name('stock.report');
		Route::get('/report/pdf', 'StockController@stockReportPDF')->name('stock.report.pdf');
		Route::get('/report/supplier/product/wise', 'StockController@stockReportSPWise')->name('stock.report.supplier.product.wise');
		Route::get('/report/supplier/wise/pdf', 'StockController@stockReportSupplierWisePDF')->name('stock.report.supplier.wise.pdf');
		Route::get('/report/product/wise/pdf', 'StockController@stockReportProductWisePDF')->name('stock.report.product.wise.pdf');
		
	});
});
Route::group(['middleware' =>'auth'], function(){
	Route::prefix('orders')->group(function(){
		Route::get('/pending/orders', 'OrderController@pendingOrder')->name('orders.prnding');
		
		
	});
});

// Return To ACI
Route::group(['middleware' =>'auth'], function(){
	Route::prefix('acireturn')->group(function(){
		Route::get('/view', 'ReturnController@view')->name('return.aci.view');
		Route::get('/pending/list', 'ReturnController@pendingList')->name('return.aci.pending.list');
		Route::get('/add', 'ReturnController@add')->name('return.aci.add');
		Route::post('/store', 'ReturnController@store')->name('return.aci.store');
		Route::get('/approve/{id}', 'ReturnController@ReturnAciApprove')->name('return.aci.approve');
		Route::post('/approve/store/return/{id}', 'ReturnController@ReturnAciApproveStore')->name('approval.store.return.aci');
		Route::get('/delete/return/{id}', 'ReturnController@ReturnAciDelete')->name('return.aci.delete');
	});
});


// Return To Customer
Route::group(['middleware' =>'auth'], function(){
	Route::prefix('returncustomer')->group(function(){
		Route::get('customer/return/view', 'ReturnCusProductController@view')->name('customer.view');
		Route::get('customer/return/add', 'ReturnCusProductController@add')->name('customer.return.add');
		Route::post('customer/return/store', 'ReturnCusProductController@store')->name('customer.return.store');
		Route::get('customer/return/pending', 'ReturnCusProductController@PendingReturnList')->name('customer.return.to.approve.list');
		Route::get('customer/return/approve/{id}', 'ReturnCusProductController@ApproveReturn')->name('cust.return.approve');
		Route::post('customer/return/approve/store/{id}', 'ReturnCusProductController@ApproveCustomerReturnStore')->name('customer.return.approve.store');
		Route::get('/delete/{id}', 'ReturnCusProductController@delete')->name('customer.return.delete');
		Route::get('/cutomer/return/approve/{id}', 'ReturnCusProductController@CusReturnApprove')->name('customer.return.approve');
		
		
	});
});