<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use App\Models\Review;
use App\Models\UmkmProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // 1. Batasan Anti-Spam Per IP (Maksimal 5 ulasan per IP per hari)
        $ipKey = 'submit-review:' . $request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, 5)) {
            return redirect()->back()->with('error', 'Anda telah mencapai batas pengiriman ulasan (maksimal 5 ulasan per hari dari perangkat ini). Silakan coba lagi besok.');
        }

        // 2. Batasan Kuota Ulasan Harian Sistem (Maksimal 100 ulasan per hari secara keseluruhan)
        $todayCount = Review::whereDate('created_at', now()->toDateString())->count();
        if ($todayCount >= 100) {
            return redirect()->back()->with('error', 'Maaf, kuota pengiriman ulasan harian sistem (100 ulasan/hari) telah tercapai demi mencegah spam. Silakan coba lagi besok.');
        }

        $validated = $request->validate([
            'type' => 'required|string|in:homestay,umkm',
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3|max:1000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'rating.required' => 'Silakan pilih rating bintang (1-5).',
            'rating.min' => 'Rating minimal 1 bintang.',
            'rating.max' => 'Rating maksimal 5 bintang.',
            'comment.required' => 'Komentar ulasan wajib diisi.',
            'comment.min' => 'Komentar ulasan minimal 3 karakter.',
        ]);

        $modelClass = match ($validated['type']) {
            'homestay' => Homestay::class,
            'umkm' => UmkmProduct::class,
        };

        $targetItem = $modelClass::findOrFail($validated['id']);

        $targetItem->reviews()->create([
            'name' => $validated['name'],
            'rating' => (int) $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Catat hit rate limiter setelah ulasan berhasil dibuat (decay 24 jam / 86400 detik)
        RateLimiter::hit($ipKey, 86400);

        return redirect()->back()->with('success', 'Terima kasih! Ulasan dan rating Anda berhasil dikirim.');
    }
}

