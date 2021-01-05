<?php

use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Models\Chamado;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('', [LoginController::class, 'login']);
});

Route::group(['prefix' => 'registrar'], function () {
    Route::get('', [RegisterController::class, 'create' ]);
    Route::post('', [RegisterController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

    Route::resource('chamados', ChamadoController::class);
    Route::post('/chamados/create', [ChamadoController::class, 'store']);

    Route::resource('user', ChamadoController::class);

    Route::resource('roles', RoleController::class);
    Route::get('roles/permission/{id}', [RoleController::class, 'permission'])->name('roles.permission');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
