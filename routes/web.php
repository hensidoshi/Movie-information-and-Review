<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\MovieGenreController;
use App\Http\Controllers\Admin\MovieActorController;
use App\Http\Controllers\Admin\WatchlistController as AdminWatchlistController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\ProfileController;
use App\Http\Controllers\web\ReviewController as WebReviewController;
use App\Http\Controllers\web\WatchlistController as WebWatchlistController;
use App\Http\Controllers\web\SettingController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'role:1')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //CRUD Routes
    Route::resource('actors', ActorController::class);

    Route::resource('genres', GenreController::class);

    Route::resource('languages', LanguageController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);

    Route::resource('directors', DirectorController::class);

    Route::resource('movies', MovieController::class);

    Route::resource('reviews', AdminReviewController::class);

    Route::resource('movieGenres', MovieGenreController::class);

    Route::resource('movieActors', MovieActorController::class);
    
    Route::resource('watchlists', AdminWatchlistController::class);
});

//Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN LOGIN
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showAdminLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'adminLogin']);

});

Route::prefix('')->group(function () {

    //UserPanel Routes
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/movies', [HomeController::class, 'movies'])->name('movies');

    Route::get('/reviews', [HomeController::class, 'reviews'])->name('reviews');

    Route::get('/movie-details/{movie:slug}', [HomeController::class, 'movieDetails'])->name('details');

    Route::get('/search', [HomeController::class, 'search'])->name('movies.search');

    Route::middleware(['auth'])->group(function () {
        Route::post('/review/store/{movie:slug}', [HomeController::class, 'storeReview'])->name('reviews.store');
        
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::get('/change-password', [ProfileController::class, 'showChangePassword'])->name('password.change');
        Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::get('/review', [WebReviewController::class, 'myReviews'])->name('myReviews');
        Route::delete('/review/{id}', [WebReviewController::class, 'destroy'])->name('review.delete');
        Route::get('/review/edit/{id}', [WebReviewController::class, 'edit'])->name('review.edit');
        Route::put('/review/update/{id}', [WebReviewController::class, 'update'])->name('review.update');

        Route::get('/watchlist', [WebWatchlistController::class, 'index'])->name('watchlist.index');
        Route::post('/watchlist/add/{movie:slug}', [WebWatchlistController::class, 'store'])->name('watchlist.add');
        Route::post('/watchlist/move/{id}', [WebWatchlistController::class, 'move'])->name('watchlist.move');
        Route::delete('/watchlist/{id}', [WebWatchlistController::class, 'destroy'])->name('watchlist.destroy');
        Route::delete('/watchlist/remove/{slug}', [WebWatchlistController::class, 'remove'])->name('watchlist.remove');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});