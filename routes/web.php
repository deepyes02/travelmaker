<?php

use Illuminate\Support\Facades\Route;
use App\Models\Trip;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
//non-admin routes
Route::get('/', function () {
    return view('home');
});

Route::get('/trips', function(){
    return view('trips', ['trips' => Trip::with('category')->get()]);
});


Route::get('/trips/{trip:slug}', function (Trip $trip){
    return view('trip', [
        'trip' => $trip
    ]);
});

//admin routes
Route::prefix('admin')->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');
    require __DIR__.'/auth.php';

    Route::get('/trips', function(){
        return view('admin.trips', ['trips' => Trip::with('user', 'category')->get()]);
    })->middleware(['auth'])->name('trips');
});


