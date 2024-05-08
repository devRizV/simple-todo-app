<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', [DashboardController::class, 'test'])->middleware(['auth', 'verified'])->name('test');

Route::get('/todo_list', [TodoController::class, 'index'])->middleware(['auth', 'verified'])->name('todo_list');

Route::get('/show_task', [TodoController::class, 'show_task'])->middleware(['auth', 'verified'])->name('show_task');

Route::post('/store_task', [TodoController::class, 'store_task'])->middleware(['auth', 'verified'])->name('store_task');

Route::post('/update_task', [TodoController::class, 'update_task'])->middleware(['auth', 'verified'])->name('update_task');

Route::post('/task_update', [TodoController::class, 'task_update'])->middleware(['auth', 'verified'])->name('task_update');

Route::post('/delete_task', [TodoController::class, 'delete_task'])->middleware(['auth', 'verified'])->name('delete_task');

Route::get('/tasks/{id}', [TodoController::class, 'edit_task'])->middleware(['auth', 'verified'])->name('edit_task');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
