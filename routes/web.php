<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\GallerieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\MiniSpotController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\PubliereportageController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\RechercheLateralBasController;
use App\Http\Controllers\RechercheLateralHautController;
use App\Http\Controllers\ReportageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceImageController;
use App\Http\Controllers\Slider1Controller;
use App\Http\Controllers\Slider2Controller;
use App\Http\Controllers\Slider3Controller;
use App\Http\Controllers\SliderLateralBasController;
use App\Http\Controllers\SliderLateralHautController;
use App\Http\Controllers\SousCategoryController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\DevisController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
Route::resource('/admin', AdminController::class);
Route::resource('/category', CategoryController::class);
Route::resource('/sub-category', SousCategoryController::class);
Route::resource('/entreprise', EntrepriseController::class);
Route::resource('/pharmacie-garde', PharmacieController::class);
Route::resource('/magazine', MagazineController::class);
Route::resource('/publiereportage', PubliereportageController::class);
Route::resource('/service', ServiceController::class);
Route::resource('/image', ServiceImageController::class);
Route::resource('/horaire', HoraireController::class);
Route::resource('/gallerie', GallerieController::class);
Route::resource('/slider1', Slider1Controller::class);
Route::resource('/slider2', Slider2Controller::class);
Route::resource('/slider3', Slider3Controller::class);
Route::resource('/sliderhaut', SliderLateralHautController::class);
Route::resource('/sliderbas', SliderLateralBasController::class);
Route::resource('/sliderrecherche', RechercheController::class);
Route::resource('/sliderlh', RechercheLateralHautController::class);
Route::resource('/sliderlb', RechercheLateralBasController::class);
Route::resource('/mini-spot', MiniSpotController::class);
Route::resource('/reportage', ReportageController::class);
Route::resource('/pays', PaysController::class);
Route::resource('/ville', VilleController::class);
Route::resource('/parametre', ParametreController::class);
Route::resource('/popup', PopupController::class);
Route::resource('/annonce', AnnonceController::class);
Route::resource('/banner', BannerController::class);
Route::resource('/partenaire', PartenaireController::class);
Route::resource('/devis', DevisController::class);
Route::resource('/blog', BlogController::class);
});

Route::get('login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');
Route::post('authenticate',[App\Http\Controllers\AuthController::class,'authenticate'])->name('authenticate');