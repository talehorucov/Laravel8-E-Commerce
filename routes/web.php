<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/panel', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/quiz/detail/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('/quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('/quiz/{slug}/result', [MainController::class, 'result'])->name('quiz.result');
});

Route::prefix('admin')->middleware(['auth', 'LoginIsAdmin'])->group(function () {
    Route::resource('/quizzes', QuizController::class);
    // Route::resource('/questions', QuestionController::class);



    Route::prefix('quizzes')->group(function () {
        Route::get('/', [QuizController::class, 'index'])->name('quizzes.index');
        Route::get('/create', [QuizController::class, 'create'])->name('quizzes.create');
        Route::get('/edit/{quiz}', [QuizController::class, 'edit'])->name('quizzes.edit');
        Route::post('/update/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');
        Route::get('/details/{id}', [QuizController::class, 'show'])->name('quizzes.details');
        Route::get('/destroy/{quiz}', [QuizController::class, 'destroy'])->name('quizzes.destroy');
    });

    Route::prefix('questions')->group(function () {
        Route::get('/{quiz_id}', [QuestionController::class, 'index'])->name('questions.index');
        Route::post('/{id}', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/{quiz_id}/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::get('/edit/{question}', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::post('/update/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::get('/destroy/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });
});
