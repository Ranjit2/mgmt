<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.delete');
    Route::post('/tasks/{taskStatus}/status', [TaskController::class, 'status'])->name('tasks.status');
    Route::get('/tasks/show/{task}}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/assign/user', [TaskController::class, 'assign'])->name('tasks.assign');
    Route::post('/tasks/assign/user', [TaskController::class, 'assignToUser'])->name('user.assign');

});


require __DIR__.'/auth.php';
