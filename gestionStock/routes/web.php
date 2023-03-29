<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BonCmdController;
use App\Http\Controllers\BordTController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\RadiatController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Auth::routes();
// Route::view('/home',  "text")->name('home');

Route::view('/',  "text") ;
Route::resource("/articles",ArticleController::class);
Route::resource("/categories",CategorieController::class);
Route::resource('/demandes',DemandeController::class);
//Route::any("/article/search",[ArticleController::class,"search"]);
Route::any("/getArticles",[ArticleController::class,"resSearch"]);
Route::any("/getRef",[ArticleController::class,"refSearch"]);
Route::resource("/radiats",RadiatController::class);
//Route::any("/listArticle")
Route::view("/test","test");
Route::resource("/demandes",DemandeController::class);
Route::any('/getD',[DemandeController::class,"getD"]);
Route::resource("/factures",FactureController::class);
Route::any('/getB',[FactureController::class,"getB"]);
Route::resource("/salles",SalleController::class);
Route::resource('/personnes',PersonneController::class);
Route::resource('/utilisateurs',UtilisateurController::class);
Route::resource('/fournisseurs',FournisseurController::class);
Route::resource("/unites",UniteController::class);
Route::resource("/emplacements",EmplacementController::class);
Route::resource("/affectations",AffectationController::class);
Route::get('/testN',[ArticleController::class,'notify']);
Route::resource("/notifications",NotificationController::class);
Route::any("/mail",[AffectationController::class,'sendMail']);
Route::resource("/bonCmds",BonCmdController::class);
Route::resource("/marches",MarcheController::class);
// Route::resource('/bords',BordTController::class);

Route::get('/facture',[ArticleController::class,'art']);
Route::get('/AjouterFacture',[FactureController::class,'AjouterFacture']);
Route::resource('/mouvements',MovementController::class);
    Route::get("/home",[BordTController::class,"index"])->name('home')->middleware("auth");
 Route::view("v","test");