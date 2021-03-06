<?php
Route::get('/', 'SellerInvoiceController@create');

//*************************************************************
Route::any('/seller/search', 'SellerController@index');
Route::any('/seller/get', 'SellerController@get');
Route::resource('seller', 'SellerController');

//*************************************************************
Route::any('/seller-invoice/return', 'SellerInvoiceController@productReturn');
Route::any('/seller-invoice/update-return', 'SellerInvoiceController@updateReturn');
Route::any('/seller-invoice/search', 'SellerInvoiceController@index');
Route::resource('seller-invoice', 'SellerInvoiceController');

//*************************************************************
Route::any('/share-holder/search', 'ShareHolderController@index');
Route::resource('share-holder', 'ShareHolderController');

//*************************************************************
Route::any('/share-holder-cost/search', 'ShareHolderCostController@index');
Route::resource('share-holder-cost', 'ShareHolderCostController');

//*************************************************************
Route::any('/report', 'ReportController@remainingCapital');
Route::any('/report/by-month', 'ReportController@byMonth');
Route::any('/report/by-seller', 'ReportController@bySeller');
Route::any('/report/by-date', 'ReportController@byDate');

//*************************************************************
Route::any('/backup/db', 'BackupController@database');

