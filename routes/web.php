<?php

use Illuminate\Support\Facades\Route;
use App\Models\Homestay;
use App\Models\TourGuide;
use App\Models\TourPackage;
use App\Models\UmkmProduct;
use App\Models\BirdSpecies;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('pages.home', [
        'homestays' => Homestay::with('reviews')->take(3)->get(),
        'tourGuides' => TourGuide::take(2)->get(),
    ]);
});

Route::get('/tour-guide', function () {
    return view('pages.tour-guide', [
        'tourGuides' => TourGuide::all(),
        'cardPackages' => TourPackage::where('type', 'island_hopping')->get(),
        'snorkelingPackages' => TourPackage::where('type', 'snorkeling_trip')->get(),
    ]);
});

Route::get('/homestay', function () {
    return view('pages.homestay', [
        'homestays' => Homestay::with('reviews')->get(),
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
        'kerajinanProducts' => UmkmProduct::with('reviews')->where('category', 'like', '%Kerajinan%')->get(),
        'makananProducts' => UmkmProduct::with('reviews')->where('category', 'like', '%Makanan%')->get(),
    ]);
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


