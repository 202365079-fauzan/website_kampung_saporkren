<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Homestay;
use App\Models\TourGuide;
use App\Models\TourPackage;
use App\Models\UmkmProduct;
use App\Models\BirdSpecies;

Route::get('/', function () {
    return view('pages.home', [
        'homestays' => Homestay::take(3)->get(),
        'tourGuides' => TourGuide::take(2)->get(),
    ]);
});

Route::get('/tour-guide', function () {
    return view('pages.tour-guide', [
        'tourGuides' => TourGuide::all(),
        'cardPackages' => TourPackage::where('type', 'tour_5_pulau')->get(),
        'tripPackages' => TourPackage::where('type', 'trip')->get(),
        'snorkelingPackages' => TourPackage::where('type', 'snorkeling')->get(),
    ]);
});

Route::get('/homestay', function () {
    return view('pages.homestay', [
        'homestays' => Homestay::all(),
    ]);
});

Route::get('/bird-watching', function () {
    return view('pages.bird-watching', [
        'birdSpeciesList' => BirdSpecies::all(),
        'birdPackages' => TourPackage::where('type', 'bird_watching')->get(),
    ]);
});

Route::get('/umkm', function () {
    return view('pages.umkm', [
        'kerajinanProducts' => UmkmProduct::where('category', 'like', '%Kerajinan%')->get(),
        'makananProducts' => UmkmProduct::where('category', 'like', '%Makanan%')->get(),
    ]);
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
