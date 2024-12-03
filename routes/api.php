<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('show.invoice');

Route::get('all/invoices/', [App\Http\Controllers\InvoiceController::class, 'index'])->name('all.invoices');

Route::post('add/invoice/', [App\Http\Controllers\InvoiceController::class, 'store'])->name('create.invoices');

Route::delete('delete/invoice/{id},', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('delete.invoice');

Route::put('update/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('update.invoice');

Route::get('find/invoice/{text}', [App\Http\Controllers\InvoiceController::class, 'search'])->name('search.invoice');