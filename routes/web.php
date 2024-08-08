<?php

use App\Http\Controllers\IssueController;
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



// Publicly accessible routes (no authentication required)
Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('login', function () {
    return view('pages.auth.login');
})->name('login');

Route::resource('issue', IssueController::class)->only(['index', 'create', 'store']);
Route::get('issue-today', [IssueController::class, 'issueToday'])->name('issueToday');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::resource('issue', IssueController::class)->only(['edit', 'update', 'destroy']);
    Route::get('deleted-list', [IssueController::class, 'deletedList'])->name('deletedList');
    Route::get('issue/{id}/restore', [IssueController::class, 'restore'])->name('restore');
});
