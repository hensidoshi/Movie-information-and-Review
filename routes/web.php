<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MovieGenreController;
use App\Http\Controllers\MovieActorController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserReviewController;
use App\Http\Controllers\UserWatchlistController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

//CRUD Routes
Route::resource('actors', ActorController::class);

Route::resource('genres', GenreController::class);

Route::resource('languages', LanguageController::class);

Route::resource('roles', RoleController::class);

Route::resource('users', UserController::class);

Route::resource('directors', DirectorController::class);

Route::resource('movies', MovieController::class);

Route::resource('reviews', ReviewController::class);

Route::resource('movieGenres', MovieGenreController::class);

Route::resource('movieActors', MovieActorController::class);

Route::resource('watchlists', WatchlistController::class);

//Dashboard Route
Route::get('/index', [DashboardController::class, 'index'])->name('index');

//Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/', [IndexController::class, 'index'])->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//UserPanel Routes
Route::get('/userIndex', [IndexController::class, 'index'])->name('UserPanel.index');

Route::get('/userMovies', [IndexController::class, 'movies'])->name('UserPanel.movies');

Route::get('/userReviews', [IndexController::class, 'reviews'])->name('UserPanel.reviews');

Route::get('/movie-details/{id}', [IndexController::class, 'movieDetails'])->name('movie.details');

Route::get('/search', [IndexController::class, 'search'])->name('movies.search');

Route::middleware(['auth'])->group(function () {
    Route::post('/review/store/{movie}', [IndexController::class, 'storeReview'])->name('reviews.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/userProfile', [UserProfileController::class, 'profile'])->name('UserPanel.profile');
    Route::post('/userProfile/update', [UserProfileController::class, 'updateProfile'])->name('UserPanel.profile.update');
    Route::get('/change-password', [UserProfileController::class, 'showChangePassword'])->name('UserPanel.password.change');
    Route::post('/change-password', [UserProfileController::class, 'updatePassword'])->name('UserPanel.password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/userReview', [UserReviewController::class, 'myReviews'])->name('UserPanel.myReviews');
    Route::delete('/review/{id}', [UserReviewController::class, 'destroy'])->name('review.delete');
    Route::get('/review/edit/{id}', [UserReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/update/{id}', [UserReviewController::class, 'update'])->name('review.update');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/userWatchlist', [UserWatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/add/{movie}', [UserWatchlistController::class, 'store'])->name('watchlist.add');
    Route::post('/watchlist/move/{id}', [UserWatchlistController::class, 'move'])->name('watchlist.move');
    Route::delete('/watchlist/{id}', [UserWatchlistController::class, 'destroy'])->name('watchlist.destroy');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/userSettings', [UserSettingController::class, 'index'])->name('settings');
    Route::post('/settings', [UserSettingController::class, 'update'])->name('settings.update');
});

Route::get('/userSettings', function () {
    return view('UserPanel.settings');
})->name('UserPanel.settings');