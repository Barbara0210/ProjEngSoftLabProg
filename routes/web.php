<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;



//use App\Http\Controllers\Auth;
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

Route::get('/home', [AnuncioController::class, 'index']) ;

 
Route::get('/', function () {
    return view('homeVisitante');
});


//Route:: resource('anuncios',AnuncioController::class); esta linha como criamos um controlador mcr esta linha substitui todas as debaixo

Route::get('/anuncios',[AnuncioController::class, 'index']); //este vai permitir listar
Route::get('/anuncios/create',[AnuncioController::class, 'create']); // formulario para criar um anuncio
Route::post('/anuncios',[AnuncioController::class, 'store']);// clicar no botao insere na base de dados
Route::get('/anuncios/show/{anuncio}',[AnuncioController::class, 'show']); 
Route::get('/anuncios/edit/{anuncio}',[AnuncioController::class, 'edit']); 
Route::post('/anuncios/update/{anuncio}',[AnuncioController::class, 'update']);
Route::post('/anuncios/destroy/{anuncio}',[AnuncioController::class, 'destroy']);

Route::resource('comentarios',ComentarioController::class);
Route::get('comentarios/IndexAdmin/',[ComentarioController::class, 'indexAdmin']); 

Route::get('/comentarios/show/{comentario}',[ComentarioController::class, 'show']); 
Route::get('/comentarios/edit/{comentario}',[ComentarioController::class, 'edit']); 
Route::post('/comentarios/update/{comentario}',[ComentarioController::class, 'update']); 
Route::post('/comentarios/destroy/{comentario}',[ComentarioController::class, 'destroy']); 



Route::get('/users',[UserController::class, 'index']) ->middleware('is_admin');
Route::get('/users/show/{user}',[UserController::class, 'show']) ;
Route::get('/users/edit/{user}',[UserController::class, 'edit']) ->middleware('is_admin');
Route::post('/users/update/{user}',[UserController::class, 'update'])->middleware('is_admin');
Route::post('/users/destroy/{user}',[UserController::class, 'destroy'])->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('save',[PhotoController::class, 'store'])->name('upload.picture') -> middleware('is_admin');
 

Route::get('/stripe',[StripeController::class,'index'])->name('index');
Route::post('/stripe/checkout',[StripeController::class,'checkout'])->name('checkout');
Route::get('/stripe/success',[StripeController::class,'success'])->name('success');

Route::get('/stripe','App\HTTP\Controllers\StripeController@index')->name('index');
Route::post('stripe/checkout','App\HTTP\Controllers\StripeController@checkout')->name('checkout');
Route::get('stripe/sucess','App\HTTP\Controllers\StripeController@success')->name('success');


Route::get('admin/generate-pdf',[PDFController::class,'generatePDF'])-> middleware('is_admin');
Auth::routes();
