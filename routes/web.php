<?php

use App\Http\Controllers\UrlShortController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\UrlShort;

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


$shorUrls = UrlShort::all();
foreach ($shorUrls as $shorUrl) {
    Route::get('/' . $shorUrl->url_key, function () use ($shorUrl) {
        $shorUrl->visits++;
        $shorUrl->save();
        return redirect($shorUrl->to_url);
    });
}

Route::get('/', function () {
    return view('welcome');
});
Route::post('/create-guest', [UrlShortController::class, 'createGuest'])->name('create-guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
