<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your Drstocklication. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Auth::routes();
// Authentication Routes...
$this->get('login','Auth\LoginController@showLoginForm')->name('login');
$this->post('login','Auth\LoginController@login');
$this->get('logout','Auth\LoginController@logout')->name('logout');



// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard::','middleware' => 'auth'], function () {

Route::get('/', array('as' => 'index', 'uses' => 'HomeController@dashboard'));
// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register')->name('register');
    ////Article--------------------------------------
    Route::get('/articles', array('as' => 'article.index', 'uses' => 'ArticleController@index'));
    Route::get('/article/create', array('as' => 'article.create', 'uses' => 'ArticleController@create'));
    Route::post('/article', array('as' => 'article.store', 'uses' => 'ArticleController@store'));
    Route::get('/article/{article}', array('as' => 'article.show', 'uses' => 'ArticleController@show'));
    Route::get('/article/edit/{id}', array('as' => 'article.edit', 'uses' => 'ArticleController@edit'));
    Route::post('/article/edit/{id}', array('as' => 'article.update', 'uses' => 'ArticleController@update'));
    Route::get('/article/detete/{id}', array('as' => 'article.destroy', 'uses' => 'ArticleController@destroy'));
    Route::get('/search',array('as' => 'article.search', 'uses' =>"ArticleController@SearchArticle"));

    ////Category--------------------------------------
    Route::get('/categorys', array('as' => 'category.index', 'uses' => 'CategoryController@index'));
    Route::post('/category', array('as' => 'category.store', 'uses' => 'CategoryController@store'));
    Route::post('/categorys/{id}', array('as' => 'category.update', 'uses' => 'CategoryController@update'));
    Route::get('/category/{id}', array('as' => 'category.edit', 'uses' => 'CategoryController@edit'));
    Route::get('/category/delete/{id}', array('as' => 'category.destroy', 'uses' => 'CategoryController@destroy'));
    
    ///client-----------------------------------------------------
    Route::get('/clients', array('as' => 'client.index', 'uses' => 'clientController@index'));
    Route::get('/client/create', array('as' => 'client.create', 'uses' => 'clientController@create'));
    Route::post('/client', array('as' => 'client.store', 'uses' => 'clientController@store'));
    Route::get('/client/{client}', array('as' => 'client.show', 'uses' => 'clientController@show'));
    Route::get('/client/edit/{id}', array('as' => 'client.edit', 'uses' => 'clientController@edit'));
    Route::post('/client/edit/{id}', array('as' => 'client.update', 'uses' => 'clientController@update'));
    Route::get('/client/detete/{id}/{nbcmd}', array('as' => 'client.destroy', 'uses' => 'clientController@destroy'));
///Provider-----------------------------------------------
    Route::get('/providers', array('as' => 'provider.index', 'uses' => 'providerController@index'));
    Route::get('/provider/create', array('as' => 'provider.create', 'uses' => 'providerController@create'));
    Route::post('/provider', array('as' => 'provider.store', 'uses' => 'providerController@store'));
    Route::get('/provider/{provider}', array('as' => 'provider.show', 'uses' => 'providerController@show'));
    Route::get('/provider/edit/{id}', array('as' => 'provider.edit', 'uses' => 'providerController@edit'));
    Route::post('/provider/edit/{id}', array('as' => 'provider.update', 'uses' => 'providerController@update'));
    Route::get('/provider/detete/{id}/{nbcmd}', array('as' => 'provider.destroy', 'uses' => 'providerController@destroy'));

    //commande achat--------------------------------------
     Route::get('/cmdachats', array('as' => 'cmdachat.index', 'uses' => 'cmdachatController@index'));
     Route::get('/cmdachat/create', array('as' => 'cmdachat.create', 'uses' => 'cmdachatController@create'));
    Route::post('/cmdachat', array('as' => 'cmdachat.store', 'uses' => 'cmdachatController@store'));
    Route::post('/cmdachat/edit/{id}', array('as' => 'cmdachat.update', 'uses' => 'cmdachatController@update'));
    Route::get('/cmdachat/{id}', array('as' => 'cmdachat.edit', 'uses' => 'cmdachatController@edit'));
    Route::get('/cmdachat/delete/{id}', array('as' => 'cmdachat.destroy', 'uses' => 'cmdachatController@destroy'));
    Route::get('/cmdachats/show/{id}', array('as' => 'cmdachat.show', 'uses' => 'cmdachatController@show'));
    //achat ligne------------------------------------------------------
     Route::get('/Ligneachats/{id}', array('as' => 'Ligneachat.index', 'uses' => 'LigneachatController@index'));
     Route::post('/Ligneachat/create/{id}', array('as' => 'Ligneachat.store', 'uses' => 'LigneachatController@store'));
      Route::get('/Ligneachat/edit/{id}', array('as' => 'Ligneachat.edit', 'uses' => 'LigneachatController@edit'));
      Route::post('/Ligneachat/edit/{id}', array('as' => 'Ligneachat.update', 'uses' => 'LigneachatController@update'));
      Route::get('/Ligneachat/detete/{idcmd}/{id}', array('as' => 'Ligneachat.destroy', 'uses' => 'LigneachatController@destroy'));
         //facture------------------------------------------------
       Route::get('/Invoices', array('as' => 'Invoice.index', 'uses' => 'InvoiceController@index'));
       Route::get('/Invoice/create/{idcmd}', array('as' => 'Invoice.store', 'uses' => 'InvoiceController@store'));
       Route::get('/Invoice/{id}', array('as' => 'Invoice.edit', 'uses' => 'InvoiceController@edit'));
       Route::post('/Invoice/edit/{id}', array('as' => 'Invoice.update', 'uses' => 'InvoiceController@update'));

       Route::get('/Invoice/show/{id}', array('as' => 'Invoice.show', 'uses' => 'InvoiceController@show'));
        Route::get('/Invoice/show/pdf/{id}', array('as' => 'Invoice.PDF', 'uses' => 'InvoiceController@pdf_invoice'));
       Route::get('/Invoice/detete/{id}', array('as' => 'Invoice.destroy', 'uses' => 'InvoiceController@destroy'));
       //payement achat -----------------------------------------------
       Route::get('/Payment/create/{id}', array('as' => 'Payment.create', 'uses' => 'PaymentController@create'));
         Route::post('/Payment/create/{id}', array('as' => 'Payment.store', 'uses' => 'PaymentController@store'));
         Route::get('/Payments/{id}', array('as' => 'Payment.index', 'uses' => 'PaymentController@index'));
          Route::get('/Payment/show/{idpay}/{id}', array('as' => 'Payment.show', 'uses' => 'PaymentController@show'));
          Route::get('/Payment/PDF/{idpay}/{id}', array('as' => 'Payment.PDF', 'uses' => 'PaymentController@PDF'));
           Route::get('/Payment/destroy/{id}/{idcmd}', array('as' => 'Payment.destroy', 'uses' => 'PaymentController@destroy'));
          //commande vente--------------------------------------
     Route::get('/cmdventes', array('as' => 'cmdvente.index', 'uses' => 'cmdventeController@index'));
     Route::get('/cmdvente/create', array('as' => 'cmdvente.create', 'uses' => 'cmdventeController@create'));
    Route::post('/cmdvente', array('as' => 'cmdvente.store', 'uses' => 'cmdventeController@store'));
    Route::post('/cmdvente/edit/{id}', array('as' => 'cmdvente.update', 'uses' => 'cmdventeController@update'));
    Route::get('/cmdvente/{id}', array('as' => 'cmdvente.edit', 'uses' => 'cmdventeController@edit'));
    Route::get('/cmdvente/delete/{id}', array('as' => 'cmdvente.destroy', 'uses' => 'cmdventeController@destroy'));
    Route::get('/cmdvente/show/{id}', array('as' => 'cmdvente.show', 'uses' => 'cmdventeController@show'));
    //vente ligne------------------------------------------------------
     Route::get('/Ligneventes/{id}', array('as' => 'Lignevente.index', 'uses' => 'LigneventeController@index'));
     Route::post('/Lignevente/create/{id}', array('as' => 'Lignevente.store', 'uses' => 'LigneventeController@store'));
      Route::get('/Lignevente/edit/{id}', array('as' => 'Lignevente.edit', 'uses' => 'LigneventeController@edit'));
      Route::post('/Lignevente/edit/{id}', array('as' => 'Lignevente.update', 'uses' => 'LigneventeController@update'));
      Route::get('/Lignevente/detete/{idcmd}/{id}', array('as' => 'Lignevente.destroy', 'uses' => 'LigneventeController@destroy'));
       //facture vente------------------------------------------------
       Route::get('/Invoiceventes', array('as' => 'Invoicevente.index', 'uses' => 'InvoiceventeController@index'));
       Route::get('/Invoicevente/create/{idcmd}', array('as' => 'Invoicevente.store', 'uses' => 'InvoiceventeController@store'));
       Route::get('/Invoicevente/{id}', array('as' => 'Invoicevente.edit', 'uses' => 'InvoiceventeController@edit'));
       Route::post('/Invoicevente/edit/{id}', array('as' => 'Invoicevente.update', 'uses' => 'InvoiceventeController@update'));

       Route::get('/Invoicevente/show/{id}', array('as' => 'Invoicevente.show', 'uses' => 'InvoiceventeController@show'));
        Route::get('/Invoicevente/pdf/{id}', array('as' => 'Invoicevente.PDF', 'uses' => 'InvoiceventeController@pdf_Invoicevente'));
       Route::get('/Invoicevente/detete/{id}', array('as' => 'Invoicevente.destroy', 'uses' => 'InvoiceventeController@destroy'));
        //payment vente-----------------------------------------------
         Route::get('/Paymentventes/{id}', array('as' => 'Paymentvente.index', 'uses' => 'PaymentventeController@index'));
       Route::get('/Paymentvente/create/{id}', array('as' => 'Paymentvente.create', 'uses' => 'PaymentventeController@create'));
         Route::post('/Paymentvente/create/{id}', array('as' => 'Paymentvente.store', 'uses' => 'PaymentventeController@store'));
        
          Route::get('/Paymentvente/show/{idpay}/{id}', array('as' => 'Paymentvente.show', 'uses' => 'PaymentventeController@show'));
          Route::get('/Paymentvente/PDF/{idpay}/{id}', array('as' => 'Paymentvente.PDF', 'uses' => 'PaymentventeController@PDF_Paymentvente'));
          Route::get('/Paymentvente/destroy/{id}/{idcmd}', array('as' => 'Paymentvente.destroy', 'uses' => 'PaymentventeController@destroy'));
//User -----------------------------------
    Route::get('/users', array('as' => 'user.index', 'uses' => 'userController@index'));
    Route::get('/user/create', array('as' => 'user.create', 'uses' => 'userController@create'));
    Route::post('/user', array('as' => 'user.store', 'uses' => 'userController@store'));
    Route::get('/user/{user}', array('as' => 'user.show', 'uses' => 'userController@show'));
    Route::get('/user/edit/{id}', array('as' => 'user.edit', 'uses' => 'userController@edit'));
    Route::post('/user/edit/{id}', array('as' => 'user.update', 'uses' => 'userController@update'));
    Route::get('/user/detete/{id}', array('as' => 'user.destroy', 'uses' => 'userController@destroy'));
    //journal------------------------
    Route::get('/journal/Sortie',array('as' =>'journal.Sortie','uses'=>'JournalController@Sortie' ));
    Route::get('/journal/Entree',array('as' =>'journal.Entree','uses'=>'JournalController@Entree'));
     Route::get('/journal',array('as' =>'journal.Index','uses'=>'JournalController@Index'));


});



