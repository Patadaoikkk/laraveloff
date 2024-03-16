<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/' , 'App\Http\Controllers\PrincipalController@principal')->name('site.index');
Route::get('/sobrenos' , 'App\Http\Controllers\sobrenosController@principal')->name('site.sobrenos');
Route::get('/contato' , 'App\Http\Controllers\contatoController@principal')->name('site.contato');

Route::prefix('/admin')-> group (function(){
    Route::get('/clientes', function() {return'clientes';});
    Route::get('/fornecedores', function() {return'fornecedores';});
    Route::get('/produtos', function(){return'produtos';});
});
   
Route::get('/admin' ,function(){
    return redirect()->route('site.index');
});

Route::fallback(function(){
    echo'a rota não existe <a href="'.route('site.index').'">clique aqui</a> ';
});

Route::get('/quemsomos', function (){
    return 'Quem somos';
});

Route::get('/contato', function (){
    return 'contato';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato/ {nome}/ {mensagem}',
function(String $nome, String $mensagem = 'sem texto'){echo'passagem de parametros via browser: '.$nome - $mensagem ;});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
