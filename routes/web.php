<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use App\Models\Trip;
// use PHPUnit\TextUI\XmlConfiguration\Group;
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
Route::get('/', fn () => view('home'));
Route::get('/trips', [TripController::class, 'index']);
Route::get('/trips/{trip:slug}', [TripController::class, 'trip_by_slug']);

require __DIR__ . '/auth.php';

//admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');


    //read trips archive
    Route::get('trips', [TripController::class, 'getAdminTrips'])->middleware(['auth'])->name('trips');
    //read trashed trips
    Route::get('trips/trash', [TripController::class, 'getSoftDeletedTrips'])->middleware(['auth'])->name('getTrashedTrips');
    //read add-trip page
    Route::get('add-trip', [TripController::class, 'getAddAdminTrip'])->middleware(['auth'])->name('add-trip');
    //update trip on add-trip page
    Route::post('add-trip', [TripController::class, 'createNewTrip'])->middleware(['auth'])->name('createNewTrip');
    //read edit-trip page by trip slug
    Route::get('edit-trip/{trip:slug}', [TripController::class, 'getEditAdminTrip'])->middleware(['auth'])->name('get-edit-trip');
    //update edit-trip page
    Route::post('edit-trip/{trip:slug}', [TripController::class, 'updateTrip'])->middleware(['auth'])->name('update-trip');

    //delete trip route (trash)
    Route::delete('delete-trip/{trip:slug}', [TripController::class, 'deleteTrip'])->middleware(['auth'])->name('delete-post');

    //force delete trip route
    Route::delete('force-delete-trip/{trip:slug}', [TripController::class, 'forceDeleteTrip'])->middleware(['auth'])->name('force-delete-post');
    //restore deleted trip
    Route::post('restore-trip/{trip:slug}', [TripController::class, 'restoreTrip'])->middleware(['auth'])->name('restoreTrip');

    // read categories archive
    Route::get('categories', [CategoryController::class, 'index'])->middleware(['auth'])->name('getCategories');

    //read add-category page
    Route::get('add-category', [CategoryController::class, 'getAddCategory'])->middleware(['auth'])->name('getAddCategory');
    Route::post('add-category', [CategoryController::class, 'createNewCategory'])->middleware(['auth'])->name('createNewCategory');

    Route::get('edit-category/{category:slug}', [CategoryController::class, 'getEditCategory'])->middleware(['auth'])->name('edit-category');
    Route::post('update-category/{category:slug}', [CategoryController::class, 'updateCategory'])->middleware(['auth'])->name('update-category');
});
