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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');
Route::post('/add-new-user', 'UserController@store')->name('new-user');
Route::get('/investor/join-salt-capital-investing','UserController@create');

Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],function () {
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'InvestmentController@test');
// Listings
Route::get('/create-listing', 'ListingController@index')->name('create-listing');
Route::post('/post-new-listing', 'ListingController@store')->name('post-listing');
Route::post('/update-listing', 'ListingController@update')->name('update-listing');
Route::get('/view-listing/{id}', 'ListingController@show')->name('update-listing-form');
Route::get('/view-active-listings', 'ListingController@viewAllActive')->name('view-active-listings');
Route::get('/view-funded-listings', 'ListingController@viewAllFunded')->name('view-funded-listings');
Route::get('/view-inactive-listings', 'ListingController@viewAllInactive')->name('view-inactive-listings');
Route::get('/view-archived-listings', 'ListingController@viewAllArchived')->name('view-archived-listings');
Route::get('/delete-document', 'ListingController@deleteDocument')->name('delete-document');
Route::get('/delete-image', 'ListingController@deleteImage')->name('delete-image');
Route::get('/investor-listing/{id}', 'ListingController@adminListing')->name('admin-listing');
// Investments
Route::get('/add-investment', 'InvestmentController@index')->name('add-investment');
Route::post('/add-investment', 'InvestmentController@store')->name('add-investment');
Route::get('/add-investment-from-notifications/{id}', 'InvestmentController@autoFill')->name('add-from-notes');
Route::get('/view-active-investments', 'InvestmentController@viewAllActive')->name('view-active-investments');
Route::get('/view-completed-investments', 'InvestmentController@viewAllComplete')->name('view-completed-investments');
Route::get('/cancel-investment/{id}', 'InvestmentController@cancel')->name('cancel-investment');
Route::post('/print-csv/{listing_id}', 'InvestmentController@exportInvestments')->name('printInvestmentCSV');
Route::get('/view-pending-investments', 'InvestmentController@viewPending')->name('view-pending-investments');
Route::get('/show-listing-pending/{id}', 'InvestmentController@showListingPending')->name('show-listing-pending');
Route::get('/show-listing-active/{id}', 'InvestmentController@viewListingActive')->name('show-listing-active');
Route::get('/reconcile-earnings/{id}', 'InvestmentReturnController@index')->name('reconcile');

//Investment Returns
Route::post('/get-investment-user', 'InvestmentReturnController@returnUser')->name('returnUser');
Route::post('/submit-return', 'InvestmentReturnController@store')->name('submit-return');
Route::get('/completed-investments', 'InvestmentReturnController@viewAll')->name('view-completed-investments');
Route::post('/update-return', 'InvestmentReturnController@update')->name('update-return');



//User profile
Route::get('/view-all-users', 'UserController@viewAllUsers')->name('view-all-users');
Route::get('/view-user/{id}', 'InvestorController@show')->name('view-user');
Route::post('/save-note', 'AdminPostsController@store')->name('save-note');
Route::get('/private-files/{file?}','FileController@get')->where('file', '(.*)');
Route::get('/approval-list', 'UserController@approvalList')->name('approval-list');
Route::get('/approve-user/{id}', 'UserController@approveUser')->name('approve-user');
Route::get('/decline-user', 'UserController@declineUser')->name('decline-user');
Route::get('/view-user-investments/{id}', 'InvestmentController@viewInvestorProperties')->name('viewInvestorProperties');
});


Route::group(['prefix' => 'investor', 'middleware' => ['auth', 'verified']], function () {
Route::get('/home', 'InvestorController@index')->name('investor-home');
Route::get('/view-listings', 'ListingController@viewAllActive')->name('view-listings');
Route::get('/view-funded-listings', 'ListingController@viewAllFunded')->name('funded-listings');
Route::get('/investor-listing/{id}', 'ListingController@investorListing')->name('investor-listing');
Route::get('/property-invest/{id}', 'InvestmentController@create')->name('property-invest');
Route::post('/submit-investment', 'InvestmentController@sendInvestment')->name('submit-investment');
Route::get('/update-profile', 'UserController@edit')->name('update-profile');
Route::post('/update-profile', 'UserController@update');
Route::post('update-avatar', 'UserController@updateAvatar')->name('update-avatar');
Route::get('/view-my-investments', 'InvestmentController@viewMyActive')->name('viewMyActive');
Route::get('change-password', 'UserController@updatePassword')->name('change-password');
Route::post('change-password', 'UserController@storeNewPassword');
Route::post('/submit-post', 'ListingPostController@store')->name('createPost');
Route::get('/my-completed-investments', 'InvestmentReturnController@viewAllByUser')->name('view-my-completed-investments');


//chat
Route::post('submit-message', 'MessageController@store')->name('submitMessage');




});

Route::post('/add-update/{user}/{listing}', 'UpdateController@store')->name('add-update');
Route::get('mark-read', 'UpdateController@update')->name('mark-read');
