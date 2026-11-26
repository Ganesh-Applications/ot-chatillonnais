<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes web
|--------------------------------------------------------------------------
|
| Routes gérées par Acorn (routeur Laravel). Les URL qui ne correspondent
| à aucune route sont traitées normalement par WordPress
| (voir ->withRouting(wordpress: true) dans functions.php).
|
| Le groupe "web" d'Acorn n'inclut pas la vérification CSRF :
| elle est ajoutée explicitement sur les routes qui reçoivent un formulaire.
|
*/

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->middleware(ValidateCsrfToken::class)
    ->name('newsletter.subscribe');
