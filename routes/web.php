<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClousureController;
//////////////////////////////////////// Tests    //////////////////////////////////////////////////////////////
use Illuminate\Http\Request;
Route::get('/testEspGet', 'ClousureController@testEspGet');
Route::post('/testEspPost', function (Request $request)
{
    return '<h2>You requested ' .$request->param1.' '.$request->param2.'</h2> with method POST';
});
Route::get('/sensorDatas', 'ClousureController@sensorData');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();
Route::get('/', 'Cafe\CustomerController@index')->name('welcomee'); 
Route::get('/home', 'HomeController@index')->name('home'); 
Route::namespace('Cafe')->prefix('cafe')->name('cafe.')->group(function(){
    Route::post('adminPage/alkoal','CafeAdminController@finished')->name('finished');
    Route::resource('/adminPage', 'CafeAdminController');
    Route::post('product/make','CafeAdminController@makeProduct')->name('product.make');
    Route::get('order/out','CafeAdminController@fastOrderShow')->name('order.out');
    Route::post('fastOrder/finish','CafeAdminController@finishFastOrder')->name('finish.fast');
    Route::post('adminPage/sellGroup','CafeAdminController@sellGroup')->name('sell.group');
    Route::post('adminPage/change/password','CafeAdminController@changePassword')->name('change.password');
});
Route::namespace('Cafe')->prefix('cafes')->name('cafe2.')->group(function(){
    Route::resource('/adminPage', 'CafeAdminController2');});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users','UserController');
    Route::get('activation/requests', 'UserController@test')->name('activation.requests');
});
Route::namespace('Cafe')->prefix('customer')->name('customer.')->group(function(){
	Route::post('contact', 'CustomerController@contactUs')->name('contact');
    Route::get('cart','CustomerController@cartAdder')->name('cart');
    Route::get('choose/cafe/{id}', 'CustomerController@specials')->name('choose.cafe');
    Route::post('cart/orderer', 'CustomerController@orderer')->name('cart.orderer');
	Route::get('remove/cart/{id}', 'CustomerController@removeCart')->name('cart.cancel');
	Route::post('addNew', 'CustomerController@addToCart')->name('toCart');
	Route::get('cafe/search', 'CustomerController@searchCafe')->name('cafe.search');
    Route::get('menu/specials', 'CustomerController@cafes')->name('menu.specials');
    Route::post('cafe/search/auto', 'CustomerController@autoSearch')->name('cafe.search.auto');
    Route::post('place/search/auto', 'CustomerController@fech')->name('place.search.auto'); 
    Route::post('account/activation', 'CustomerController@activate')->name('account.activation');
    Route::post('activate/confirm', 'CustomerController@confirm')->name('activate.confirm');
    Route::get('activation', 'CustomerController@activationStart')->name('activation.show');
});
Route::get('setting', 'Cafe\SettingController@index')->name('setting');
Route::post('change-setting', 'Cafe\SettingController@change')->name('setting.change');
Route::post('setting/addPrinter/store', 'Cafe\SettingController@addPrinter')->name('setting.addPrinter.store');
Route::get('setting/addPrinter/show', 'Cafe\SettingController@showPrinterForm')->name('setting.addPrinter.show');

//Route::post('setting/printer/delete/{id}', 'Cafe\SettingController@deletePrinter')->name('setting.delete.printer');


Route::get('editProfile', 'Cafe\ProfileController@profileEditor')->name('profile.edit');
Route::post('updateProfile', 'Cafe\ProfileController@updateProfile')->name('profile.update');
Route::get('setting/open-close/show', 'Cafe\OpenCloseController@show')->name('setting.open-close.show');
Route::post('setting/open-close/save', 'Cafe\OpenCloseController@save')->name('setting.open-close.save');
Route::get('open-close/times/all', 'Cafe\OpenCloseController@checkCloseOpenTime')->name('setting.open-close.all');
Route::post('toggle/switch', 'ClousureController@toggle');
Route::post('delete/data', 'ClousureController@delete');

Route::get('/download/list','ClousureController@downloads')->name('download.list');
Route::get('/upload/show', 'ClousureController@uploads')->name('upload.show');
Route::get('/test/image', 'ClousureController@Itest');
Route::post('/upload/file', 'ClousureController@uploadFile')->name('file.upload');
Route::get('/view-cache','ClousureController@viewCache');
Route::get('/route-cache', 'ClousureController@routeCache');
Route::get('/config-cache', 'ClousureController@configCache');
Route::get('/clear','ClousureController@clear');
Route::get('generate/seat/index', 'ClousureController@index')->name('generate.seat');
Route::post('generate/seat/generator', 'ClousureController@generateTable')->name('generate.table.download');


Route::namespace('Admin')->prefix('agent')->name('agent.')->group(function(){
    Route::get('index', 'AgentController@index');
    Route::get('list', 'AgentController@list')->name('list');
    Route::post('register', 'AgentController@register')->name('register');
    Route::post('toggle', 'AgentController@toggle')->name('toggle');
    //Route::post('delete/{id}', 'AgentController@delete')->name('delete');
});

Route::get('testNotif', [ClousureController::class, 'testNotif']);

Route::get('activation/confirm/show', function(){ return view('adminPage.cafeAdmin.showBankAccount')
    ->with('data','1000200906881');})
    ->name('confirmation.show');
Route::get('customer/contact/us', function () {return view('guest.contactUs');})->name('customer.contact.us');
Route::get('testPrinter', 'ClousureController@testPrinter');
Route::get('testActive',  function () {return view('Test.testActive');});
Route::fallback(function(){
    return "<h2>Threre is no such route</h2>\n<a href='https://warkaorder.com'>Return to Guest Page</a><br><a href='https://warkaorder.com/home'>Return to Cafe(Hotel) Home</a>";});

?>
