<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SpeackerController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutspeackController;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[FrontendController::class,'index'])->name('dashboard');
Route::get('/speaker',[FrontendController::class,'speaker'])->name('speacker');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/blog',[FrontendController::class,'blog'])->name('blog');
Route::get('/ticket',[FrontendController::class,'ticket'])->name('ticket');
Route::get('/booktiket/{id}',[FrontendController::class,'booktiket'])->name('booktiket');
Route::get('/eventdetail/{id}',[FrontendController::class,'eventdetail'])->name('eventdetail');
Route::post('/contactform',[FrontendController::class,'contactform'])->name('contactform');
Route::post('/tiketform',[FrontendController::class,'tiketform'])->name('tiketform');


Auth::routes();
//Route::namespace('admin')->group(function () {
    
Route::prefix('admin')->middleware('auth')->group(function () {
//Route::prefix(['prefix' => 'admin','middlewre'=>'auth'], function() {
    Route::get('/', [BackendController::class, 'index']);

    Route::resource('country',CountryController::class);
    Route::resource('state',StateController::class);
    Route::resource('city',CityController::class);
    Route::resource('users',UserController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('speacker',SpeackerController::class);
    Route::resource('feature',FeatureController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('tiket',TiketController::class);
    Route::resource('aboutspeack',AboutspeackController::class);

    Route::post('changestatuscountry',[CountryController::class,'changeStatusCountry'])->name('changestatuscountry');
    Route::post('changestatusstate',[StateController::class,'changeStatusState'])->name('changestatusstate');
    Route::post('changestatuscity',[CityController::class,'changeStatusCity'])->name('changestatuscity');
    Route::post('changestatususers',[UserController::class,'changeStatusUsers'])->name('changestatususers');
    Route::post('changestatusslider',[SliderController::class,'changeStatusSlider'])->name('changestatusslider');
    Route::post('changestatusspeacker',[SpeackerController::class,'changeStatusSpeacker'])->name('changestatusspeacker');
    Route::post('changestatusfeature',[FeatureController::class,'changeStatusFeature'])->name('changestatusfeature');
    Route::post('changestatusblog',[BlogController::class,'changeStatusBlog'])->name('changestatusblog');
    Route::post('changestatustiket',[TiketController::class,'changeStatusTiket'])->name('changestatustiket');
    Route::post('changestatusaboutspeack',[AboutspeackController::class,'changestatusAboutspeack'])->name('changestatusaboutspeack');

    Route::post('/getstate',[CommonController::class,'getState'])->name('getstate');
    Route::post('/getcity',[CommonController::class,'getCity'])->name('getcity');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
