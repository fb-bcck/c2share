<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/','HomeController@index')->name('home');

Route::get('/kontakt', function () {
    return view('kontakt');
});
Route::get('/impressum', function () {
    return view('impressum');
});
Route::get('/ueberuns', function () {
    return view('ueberuns');
});
Route::get('/datenschutz',function(){
    return view('datenschutz');
});

//Suche, Testimpl
Route::get('/suche','SearchController@index');
Route::get('/search','SearchController@search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//routes for showing and creating adverts
Route::get('/advert','AdvertController@index')->name('advert.index');
Route::get('/advert/create', 'AdvertController@create')->name('advert.create')->middleware('auth');
Route::get('/advert/create_step2','AdvertController@step2')->name('step2')->middleware('auth');
Route::get('/advert/create_step3','AdvertController@step3')->name('step3')->middleware('auth');
Route::post( '/advert', 'AdvertController@store')->name('advert.store')->middleware('auth');
Route::get('/advert/{id}/edit/', 'AdvertController@edit')->name('advert.edit')->middleware('auth');
Route::post('/advert/{id}/update/', 'AdvertController@update')->name('advert.update')->middleware('auth');
Route::get('/advert/{id}/show/','AdvertController@show')->name('advert.show');



//deleting values from adverts
Route::get('/advert/{id}/destroy/','AdvertController@destroy')->name('advert.destroy')->middleware('auth');

//searching for adverts
Route::get('/searchresult','SearchController@staticsearch')->name('search.search');
Route::get('/searchmask/{id}','AdvertController@getByProductCategory')->name('searchmask.productCat');

//routes for showing and creating inquiries
Route::get('/inquiries','InquiryController@index')->name('inquiries.index');
Route::get('/inquiries/denied','InquiryController@showdenied')->name('denied.show');
Route::get('/inquiries/requested','InquiryController@showrequested')->name('requested.show');
Route::get('/inquiries/confirmed','InquiryController@showconfirmed')->name('confirmed.show');
Route::get('/inquiries/all','InquiryController@showall')->name('all.show');

Route::get('/inquiries/{id}/create','InquiryController@create')->name('inquiries.create');
Route::post('/inquiries','InquiryController@store')->name('inquiries.store');
//Anfragen von anderen Nutzern verwalten
Route::get('/inquiries/mine','InquiryController@mine')->name('inquiries.mine');
/**
 * deleting values from inquiries
 */
Route::get('/inquiries/{id}/destroy/','InquiryController@destroy')->name('inquiries.destroy')->middleware('auth');
Route::get('/inquiries/{id}/reject/','InquiryController@reject')->name('inquiries.reject')->middleware('auth');
Route::get('/inquiries/{id}/confirm/','InquiryController@confirm')->name('inquiries.confirm')->middleware('auth');

//routes for showing and crating reclamations
Route::get('/reclamations','ReclamationController@index')->name('reclamations.index');
Route::get('/reclamations/{id}/show/','ReclamationController@show')->name('reclamations.show')->middleware('auth');
Route::get('/reclamations/{id}/create', 'ReclamationController@create')->name('reclamation.create')->middleware('auth');
Route::post('/reclamations','ReclamationController@store')->name('reclamation.store')->middleware('auth');
Route::get('/reclamations/againstMe','ReclamationController@againstMe')->name('reclamation.againstMe')->middleware('auth');
//routes for admin rejecting or confirming reclamations
Route::get('/reclamations/{id}/confirm/', 'ReclamationController@confirm')->name('reclamation.confirm')->middleware('auth');
Route::get('/reclamations/{id}/reject/', 'ReclamationController@reject')->name('reclamation.reject')->middleware('auth');


//routes for showing history
Route::get('/history','HistoryController@index')->name('history.index');

/**
 * Profil anzeigen/ändern ect.
 */
//Route::get('/profile','ProfileController@index')->name('profile.index');
Route::get('/profile','ProfileController@index')->name('profile.index');
Route::get('/profile/{id}/show','ProfileController@showContact')->name('profile.index')->middleware('auth');

//Profil ändern
Route::get('/profile/{id}/edit','ProfileController@edit')->name('profile.edit');
Route::post('/profile/{id}/update','ProfileController@update')->name('profile.update');


//Passwortänderung
Route::get('change-password/{id}', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

/**
 * Nachrichten
 */
Route::get('/send','MessageController@store')->name('sendmessage');
Route::get('/messages','MessageController@show')->name('showmessages');
Route::get('/messages/{id}/destroy','MessageController@destroy')->name('destroymessage');
Route::post('/messages/search','MessageController@search')->name('searchmessage');


/**
 * Alles mit Chat, experimental
 *
 */


