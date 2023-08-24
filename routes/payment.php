<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\WebhooksController;

/* PAYPAL */

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('{course}/approved', [PaymentController::class, 'approved'])->name('approved');
/* PAYPAL */
/* MERCADO PAGO */

Route::get('{course}/show', [PaymentController::class, 'show'])->name('show');
Route::get('{course}/paymercado', [PaymentController::class, 'paymercado'])->name('paymercado');
Route::post('webhooks', WebhooksController::class);
/* MERCADO PAGO */