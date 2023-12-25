<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Opportunity;
use App\Http\Controllers\Event;
use App\Http\Controllers\App;
use App\Http\Controllers\Directory;
use App\Http\Controllers\FeedsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

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

Route::get('/', [App::class, 'displayOpp']);
Route::get('/opportunities', function(){
    return view('opportunities');
});
Route::get('/opp-feeds', [App::class, 'getOppFeed']);
Route::get('/event-feeds', [App::class, 'getEventFeed']);
Route::get('/events', [App::class, 'displayEvents']);
Route::get('/feeds', [FeedsController::class, 'fetchFeeds'])->name("find.feeds");
Route::get('/news-feed', [FeedsController::class, 'displayFeeds'])->name("daily.feeds");
Route::get('op/{id}/{title}', [App::class, 'readOpportunity'])->name('read.blog');
Route::get('ev/{id}/{title}', [App::class, 'readEvent'])->name('read.ev');
Route::get('/search-opportunities', [App::class, 'searchOpportunities']);
Route::get('/search-events', [App::class, 'searchEvents']);

Route::get('/subscribe', function(){return view('subscribe');});
Route::get('/feedback',  function(){return view('feedback');})->name('feedback');

/**Login access control */
Route::get('/dashboard', [Dashboard::class, "accessControl"]);

/**Public Routes */
Route::post('/upvote-post', [PostController::class, 'upvote']);
Route::get('/report/{id}', [PostController::class, 'report']);


/**admin routes */
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin-dashboard', [Dashboard::class, "accessControl"])->name('admin.dashboard');

    //handle events
    Route::get('/admin-post-event', [Event::class, "show"])->name('admin.ev');
    Route::get('/admin-edit-event/{id}', [Event::class, "edit"])->name('admin.edit.ev');
    Route::post('/admin-update-event/{id}', [Event::class, "update"])->name('admin.update.ev');
    Route::post('/admin-store-event', [Event::class, "store"])->name('admin.store.ev');
    Route::get('/admin-delete-event/{id}', [Event::class, "delete"])->name('admin.delete.ev');

    //handle opportunities 
    Route::get('/admin-post-opportunity', [Opportunity::class, "show"])->name('admin.opp');
    Route::get('/admin-edit-opportunity/{id}', [Opportunity::class, "edit"])->name('admin.edit.opp');
    Route::post('/admin-update-opportunity/{id}', [Opportunity::class, "update"])->name('admin.update.opp');
    Route::post('/admin-store-opportunity', [Opportunity::class, "store"])->name('admin.store');
    Route::get('/admin-delete-opportunity/{id}', [Opportunity::class, "delete"])->name('admin.delete.opp');

    //handle business directory
    Route::get('/admin-directory', [Directory::class, "show"])->name('admin.directory');
});

/**subscriber routes */
Route::middleware(['auth', 'role:subscriber'])->group(function(){
    Route::get('/subscriber-dashboard', function(){
    return view('subscriber.dashboard');
    })->name('subscriber.dashboard');
});

/**profile routes */
Route::middleware('auth')->group(function () {
    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
