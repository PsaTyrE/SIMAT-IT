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

Route::get('/', function () {
    return view('pages.dashboard', [
        'type_menu' => 'dahsboard'
    ]);
})->name('dashboard');

Route::resource('issue', IssueController::class);
Route::get('issue-today', [IssueController::class, 'issueToday'])->name('issueToday');
Route::get('deleted-list', [IssueController::class, 'deletedList'])->name('deletedList');
Route::get('{id}/restore', [IssueController::class, 'restore'])->name('restore');
