<?php

use App\Http\Controllers\WebController;
use App\Services\CryptoService;
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

Route::get(
    '/',  [WebController::class, 'ssoHomePage']
)->name('SSO.HOME');

Route::get(
    '/accounts', [WebController::class, 'ssoAccountsPage']
)->name('SSO.ACCOUNTS');

Route::get(
    '/login/app/view', [WebController::class, 'appRegistrationPage']
)->name('SSO.LOGIN');

Route::post(
    '/login/app/process', [WebController::class, 'appRegistrationProcess']
)->name('SSO.LOGIN.PROCESS');

Route::get(
    '/register/app/view', [WebController::class, 'appRegistrationPage']
)->name('SSO.REGISTER');

Route::post(
    '/register/app/process', [WebController::class, 'appRegistrationProcess']
)->name('SSO.REGISTER.PROCESS');

Route::get(
    '/app/details/{appToken}', [WebController::class, 'appDetailsPage']
)->name('SSO.APP.DETAILS');


Route::get('/test/cipher', [CryptoService::class, 'testThis']);
