<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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
    return view('welcome');
});

Route::get('/answerdesk', function () {
    return view('answerDesk');
});

Route::get('/start', function () {
    return view('start');
});
Route::get('/end', function () {
    return view('end');
});

Route::any('/submitans',[QuestionController::class, 'submitans'])->name('questions.submitans');
Route::any('/startquiz',[QuestionController::class, 'startquiz'])->name('questions.startquiz');
Route::any('/questions',[QuestionController::class, 'show'])->name('questions.show');
Route::any('/add',[QuestionController::class, 'add'])->name('questions.add');
Route::any('/update',[QuestionController::class, 'update'])->name('questions.update');
Route::any('/delete',[QuestionController::class, 'delete'])->name('questions.delete');
