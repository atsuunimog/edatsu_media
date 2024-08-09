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
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\FeedsChannel;

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

Route::get('/create-storage-link', function () {
    try {
        Artisan::call('storage:link');
        echo "Storage link created successfully!";
    } catch (\Exception $e) {
        echo "Error creating storage link: " . $e->getMessage();
    }
});

Route::get('/', function(){return view('opportunities');})->name('oppty');
Route::get('/subscribe', function(){return view('subscribe');})->name("subscribe");
Route::get('/feedback',  function(){return view('feedback');})->name('feedback');
Route::get('/opportunities', function(){return view('opportunities');})->name('oppty');
Route::get('/advertise', function(){return view('advertise');})->name('advertise');
Route::get('/platforms', function(){return view('platforms');})->name('platforms');
Route::get('/about-us', function(){return view('about');})->name('about');
Route::get('/terms', function(){return view('terms');})->name('terms');
Route::get('/privacy-policy', function(){return view('privacy');})->name('privacy');
Route::get('/help', function(){return view('help');})->name('help');

//clean Caches
Route::get('/clean', function() {
Artisan::call('cache:clear');
Artisan::call('view:clear');
Artisan::call('route:clear');
Artisan::call('config:cache');
Artisan::call('sitemap:generate');
dd('CACHE-CLEARED, VIEW-CLEARED, ROUTE-CLEARED & CONFIG-CACHED & GENERATE SITEMAP WAS SUCCESSFUL!');
});

Route::get('/opp-feeds', [App::class, 'getOppFeed']);
Route::get('/event-feeds', [App::class, 'getEventFeed']);
Route::get('/events', [App::class, 'displayEvents'])->name("events");
Route::get('/feeds', [FeedsController::class, 'fetchFeeds'])->name("find.feeds");
Route::get('/news-feed', [FeedsController::class, 'displayFeeds'])->name("daily.feeds");
Route::get('op/{id}/{title}', [App::class, 'readOpportunity'])->name('read.blog');
Route::get('ev/{id}/{title}', [App::class, 'readEvent'])->name('read.ev');
Route::get('/search-opportunities', [App::class, 'searchOpportunities']);
Route::get('/search-events', [App::class, 'searchEvents']);

Route::post('/bookmark-feed', [SubscriberController::class, 'bookmarkFeed']);
Route::post('/bookmark-opportunity', [Opportunity::class, 'bookmarkOpportunity']);
Route::post('/bookmark-event', [Event::class, 'bookmarkEvent']);

/**Login access control */
Route::get('/dashboard', [Dashboard::class, "accessControl"]);

/**Public Routes */
Route::post('/upvote-post', [PostController::class, 'upvote']);
Route::get('/report/{id}',  [PostController::class, 'report']);

/**admin routes */
Route::middleware(['auth', 'role:admin'])->group(function(){
    //generic routes
    Route::get('/admin-dashboard', [Dashboard::class, "accessControl"])->name('admin.dashboard');
    Route::get('/all-users', [Dashboard::class, "allUsers"])->name('admin.users');

    //handle events
    Route::get('/admin-post-event', [Event::class, "show"])->name('admin.ev');
    Route::get('/admin-edit-event/{id}', [Event::class, "edit"])->name('admin.edit.ev');
    Route::post('/admin-update-event/{id}', [Event::class, "update"])->name('admin.update.ev');
    Route::post('/admin-store-event', [Event::class, "store"])->name('admin.store.ev');
    Route::get('/admin-delete-event/{id}', [Event::class, "delete"])->name('admin.delete.ev');
    // Route::get('/post-types', [Opportunity::class, 'CreatePostTypes'])->name('admin.post-types');
    Route::get('/all-opp-post', [Opportunity::class, 'showOpportunities'])->name('admin.all_opp_post');
    Route::get('/fetch-all-opp', [Opportunity::class, 'fetchAllOpportunities']);
    // Route::get('/post-types', [Opportunity::class, 'CreatePostTypes'])->name('admin.post-types');
    // Route::get('/post-types', [Opportunity::class, 'CreatePostTypes'])->name('admin.post-types');

    //handle channels
    Route::post('/admin-update-channel/{id}', [FeedsChannel::class, "store"])->name('admin.update.channel');
    Route::get('/admin-delete-channel/{id}', [FeedsChannel::class, "delete"])->name('admin.delete.channel');
    Route::get('/admin-edit-channel/{id}', [FeedsChannel::class, "edit"])->name('admin.edit.channel');
    Route::post('/admin-store-channel', [FeedsChannel::class, "store"])->name('admin.store.channel');


    //handle opportunities 
    Route::get('/admin-post-opportunity', [Opportunity::class, "show"])->name('admin.opp');
    Route::get('/admin-post-feeds-category', [FeedsChannel::class, "showFeedsCategory"])->name('admin.feeds.category');
    Route::get('/admin-edit-opportunity/{id}', [Opportunity::class, "edit"])->name('admin.edit.opp');
    Route::post('/admin-update-opportunity/{id}', [Opportunity::class, "store"])->name('admin.update.opp');
    Route::post('/admin-store-opportunity', [Opportunity::class, "store"])->name('admin.store');

    Route::get('/admin-delete-opportunity/{id}', [Opportunity::class, "delete"])->name('admin.delete.opp');

    //handle business directory
    Route::get('/admin-directory', [Directory::class, "show"])->name('admin.directory');
});

/**subscriber routes */
Route::middleware(['auth', 'role:subscriber'])->group(function(){
    Route::get('/subscriber-dashboard', [SubscriberController::class, 'index'])->name('subscriber.dashboard');
    Route::get('/bookmark', [SubscriberController::class, 'bookmark'])->name("subscriber.bookmark");
    Route::get('/fetch-opportunity-bookmark', [SubscriberController::class, 'listBookmarkedOpportunites'] );
    Route::get('/fetch-event-bookmark', [SubscriberController::class, 'listBookmarkedEvents']);
    Route::get('/fetch-bookmark', [SubscriberController::class, 'fetchAllBookmark']);
    Route::post('/remove-bookmark-feed', [SubscriberController::class, 'removeBookmark']);
    Route::get('/profile', [SubscriberController::class, 'initProfile'])->name('subscriber.profile');
    Route::post('/subscriber/update-profile', [SubscriberController::class, 'updateProfile'])->name('subscriber.update-profile');
});

/**general profile settings routes */
Route::middleware('auth')->group(function () {
    Route::get('/settings',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/settings',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
