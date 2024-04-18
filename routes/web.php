<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/todo/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/todo_list', [TodoController::class, 'show_task'])->middleware(['auth', 'verified'])->name('todo_list');

Route::post('/store_task', [TodoController::class, 'store_task'])->middleware(['auth', 'verified'])->name('store_task');

Route::post('/tasks/{id}', [TodoController::class, 'update_task'])->middleware(['auth', 'verified'])->name('update_task');

Route::post('/task_update/{id}', [TodoController::class, 'task_update'])->middleware(['auth', 'verified'])->name('task_update');

Route::post('/delete_task/{id}', [TodoController::class, 'delete_task'])->middleware(['auth', 'verified'])->name('delete_task');

Route::get('/tasks/{id}', [TodoController::class, 'edit_task'])->middleware(['auth', 'verified'])->name('edit_task');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
