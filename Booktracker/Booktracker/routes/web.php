<?php

Route::get('/', 'LoginController@index')->name('login');

// Login
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verifyUser');

// Logout
Route::get('/logout', 'LoginController@logout')->name('logout');

// Registration
Route::get('/registration', 'RegistrationController@index')->name('registration');
Route::post('/registration', 'RegistrationController@register_user');

// This route require user session
Route::group(['middleware' => 'checkSession'], function(){

    // Home controller
    Route::get('/my-added-book', 'HomeController@index')->name('MyAddedBooks');
    Route::get('/all-books', 'HomeController@showAllBook')->name('AllBooks');
    Route::get('/add-book', 'HomeController@addNewBook')->name('AddBooks');
    Route::get('/want-to-read-books', 'HomeController@wantToReadBook')->name('wantToReadBooks');
    Route::get('/already-read-books', 'HomeController@alreadyReadBook')->name('already_ReadBooks');

    // Book controller
    Route::post('/add-book', 'BookController@insertBook');
    Route::post('/all-books', 'BookController@searchBook')->name('searchBook');
    Route::get('/book-info/{id}', 'BookController@showBook')->name('showBookinfo');
    Route::get('/book-info-global/{id}', 'BookController@showBookGlobal')->name('showBookinfo_global');
    Route::get('/edit-bookinfo/{id}', 'BookController@editBook')->name('editBookinfo');
    Route::get('/book-in-my-collection', 'BookController@showCollectedBookPage')->name('CollectedBookPage');
    Route::post('/book-in-my-collection', 'BookController@addBookinCollectionList');
    Route::post('/delete-book-in-my-collection', 'BookController@deleteBookinCollectionList')->name('removeCollectedBook');
    Route::post('/submit-review', 'BookController@submitReview')->name('submitReview');
    Route::post('/submit-rating', 'BookController@submitRating')->name('rateBook');
    Route::post('/want-to-read-request', 'BookController@wantToReadRequest')->name('wantToReadRequest');
    Route::post('/already-read-request', 'BookController@alreadyReadRequest')->name('alreadyReadRequest');
    Route::post('/book-completed', 'BookController@removeToCompleteList')->name('removeToCompleteList');
    Route::post('/remove-read-book', 'BookController@removeReadBook')->name('removeReadBook');

    Route::post('/update-book', 'BookController@updateBook')->name('updateBook');
    Route::post('/delete-book', 'BookController@deleteBook')->name('deleteBook');

    // admin
    Route::get('/admin-home', 'AdminController@showAdminHome')->name('showAdminHome');
    Route::get('/admin-user-list', 'AdminController@showAllUser')->name('showUserList');
    Route::get('/user/{id}/show', 'AdminController@showUserInfo')->name('showUserInfo');
    Route::post('/user-block', 'AdminController@blockUser')->name('requestBlockUser');
    Route::get('/blocked-user-list/show', 'AdminController@blockeduserList')->name('blockeduserList');
    Route::get('/book-list/show', 'AdminController@bookListAdmin')->name('bookListAdmin');
    Route::get('/admin/book/{id}/show', 'AdminController@showBookInfoAdmin')->name('showBookInfoAdmin');
    Route::post('/admin/search-user', 'AdminController@searchUser')->name('searchUser');
    Route::post('/admin/search-book', 'AdminController@searchBookAdmin')->name('searchBookAdmin');
    Route::post('/admin/delete-review', 'AdminController@deleteReview')->name('deleteReview');

    Route::get('/admin/edit-book/{id}', 'AdminController@editBook')->name('editBook');
    Route::post('/admin/delete-book', 'AdminController@deleteBookAdmin')->name('deleteBookAdmin');
    Route::post('/admin/update-book', 'AdminController@updateBookAdmin')->name('updateBookAdmin');

    Route::get('/admin/summary', 'AdminController@showSummaryPage')->name('summary');

});








//
