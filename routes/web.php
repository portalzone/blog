<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/control', function () {
        return Inertia::render('Control');
    })->name('control');
        // Route to get the currently authenticated user
        Route::get('/api/current-user', function () {
            // Retrieve the currently authenticated user
            $user = auth()->user();
    
            // Check if the user is authenticated
            if ($user) {
                // Return the user's information
                return response()->json(['user' => $user]);
            } else {
                // If user is not authenticated, return an error response
                return response()->json(['error' => 'User not authenticated.'], 401);
            }
        });
});

// Route::middleware(['auth'])->group(function () {

// });

Route::post('categories', [CategoryController::class, 'store']);
Route::post('posts', [PostController::class, 'store']);
// Route to get the categories of states
Route::get('/api/category-list', [PostController::class, 'getCategoryList']);

Route::get('current-user', function () {
    return response()->json(['user' => auth()->user()]);
})->middleware('auth:sanctum');