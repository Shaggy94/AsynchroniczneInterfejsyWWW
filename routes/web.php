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
app('debugbar')->disable();
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(
    ['middleware' => 'roles',
    'roles'=>'Admin'],
    function(){
        Route::get('admin',['as'=>'admin.panel','uses'=>'HomeController@adminindex']);
       
        Route::get('admin/users',['as'=>'admin.users','uses'=>'HomeController@adminusers']);
        Route::get('admin/messages',['as'=>'admin.messages','uses'=>'HomeController@adminmessages']);
        Route::get('admin/store',['as'=>'admin.store','uses'=>'HomeController@adminstore']);
        Route::get('admin/messages/{message}',['as'=>'admin.messagestree','uses'=>'HomeController@messagestree']);
        Route::post('admin/answer',['as'=>'admin.answer','uses'=>'HomeController@answer']);


        Route::get('admin/ban/{user}',['as'=>'admin.ban','uses'=>'HomeController@ban']);
        Route::get('admin/unban/{user}',['as'=>'admin.unban','uses'=>'HomeController@unban']);



        Route::get('book/create',['as'=>'book.create','uses'=>'BookController@create']);
        Route::post('books/store',['as'=> 'book.store', 'uses'=>'BookController@store']);
        Route::get('books/{book}/edit',['as'=> 'book.edit', 'uses'=>'BookController@edit']);
        Route::delete('books/{book}',['as'=>'book.delete', 'uses'=>'BookController@destroy']);
        Route::put('books/{book}',['as'=>'book.update', 'uses'=>'BookController@update']);

        Route::get('author/create',['as'=>'author.create','uses'=>'AuthorController@create']);
        Route::get('author/{author}/edit',['as'=> 'author.edit', 'uses'=>'AuthorController@edit']);
        Route::delete('author/{author}',['as'=>'author.delete', 'uses'=>'AuthorController@destroy']);
        Route::post('author/store',['as'=> 'author.store', 'uses'=>'AuthorController@store']);
        Route::put('author/{author}',['as'=>'author.update', 'uses'=>'AuthorController@update']);

        
        Route::get('category/create',['as'=>'category.create','uses'=>'CategoryController@create']);
        Route::get('category/{category}/edit',['as'=> 'category.edit', 'uses'=>'CategoryController@edit']);
        Route::delete('category/{category}',['as'=>'category.delete', 'uses'=>'CategoryController@destroy']);
        Route::post('category/store',['as'=> 'category.store', 'uses'=>'CategoryController@store']);
        Route::put('category/{category}',['as'=>'category.update', 'uses'=>'CategoryController@update']);



});

Route::group(
    ['middleware' => 'roles',
    'roles'=>'User'],
    function(){

        Route::get('book/{book}/take',['as'=> 'book.take', 'uses'=>'BookController@take']);
        Route::get('book/{book}/ordered',['as'=>'book.order','uses'=>'BookController@takeit']);

        // Route::get     
});

Route::group(
    ['middleware' => 'roles',
    'roles'=>['Banned','User']],
    function(){

        Route::get('myaccount/books',['as'=>'account.orders','uses'=>'UserController@userbooks']);
        Route::get('myaccount/history',['as'=>'account.history','uses'=>'UserController@userhistory']);
        Route::get('myaccount',['as'=>'account.info','uses'=>'UserController@index']);
        Route::get('book/return/{book}/{order}',['as'=>'book.return','uses'=>'BookController@returnbook']);

        Route::post('support/send',['as'=>'user.store','uses'=>'UserController@store']);
        Route::get('support/message/create',['as'=>'user.create','uses'=>'UserController@create']);
        
        Route::get('myaccount/messages',['as'=>'account.messages','uses'=>'UserController@messages']);
        Route::get('myaccount/messages/{message}',['as'=>'account.messagestree','uses'=>'UserController@messagestree']);
        Route::post('support/answer',['as'=>'user.answer','uses'=>'UserController@answer']);
        
        
        // Route::get     
});


//Routing służący jedynie do przęglądania
Route::get('books',['as'=>'books.index','uses'=>'BookController@index']);
Route::get('authors',['as'=>'authors.index','uses'=>'AuthorController@index']);
Route::get('categories',['as'=>'categories.index','uses'=>'CategoryController@index']);

Route::get('book/{book}',['as'=>'books.show','uses'=>'BookController@show']);

Route::get('author/{author}',['as'=>'authors.show','uses'=>'AuthorController@show']);
Route::get('author/{author}/books',['as'=>'author.showbooks', 'uses'=>'AuthorController@books']);


Route::get('category/{category}',['as'=>'categories.show','uses'=>'CategoryController@show']);
Route::get('category/{category}/books',['as'=>'category.showbooks', 'uses'=>'CategoryController@books']);
