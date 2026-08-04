<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $config = config('saporkren');

        // Admin User
        \App\Models\User::firstOrCreate([
            'email' => 'admin@saporkren.com',
        ], [
            'name' => 'Admin Saporkren',
            'password' => 'password',
        ]);

        // 1. Homestays
        foreach ($config['homestays'] as $homestay) {
            \App\Models\Homestay::create([
                'name' => $homestay['name'],
                'owner' => $homestay['owner'] ?? null,
                'short_description' => $homestay['short_description'] ?? null,
                'facilities' => $homestay['facilities'] ?? [],
                'price' => $homestay['price'] ?? null,
                'main_photo' => $homestay['mainPhoto'] ?? null,
                'maps_link' => $homestay['mapsUrl'] ?? null,
            ]);
        }

        // 2. Tour Guides
        foreach ($config['tourGuides'] as $guide) {
            \App\Models\TourGuide::create([
                'name' => $guide['name'],
                'specialty' => $guide['specialty'] ?? null,
                'languages' => $guide['languages'] ?? null,
                'experience' => $guide['experience'] ?? null,
                'transport' => $guide['transport'] ?? null,
                'description' => $guide['description'] ?? null,
                'photo' => $guide['photo'] ?? null,
            ]);
        }

        // 3. Bird Species
        foreach ($config['birdSpecies'] as $bird) {
            \App\Models\BirdSpecies::create([
                'local_name' => $bird['localName'],
                'latin_name' => $bird['latinName'] ?? null,
                'habitat' => $bird['habitat'] ?? null,
                'best_time' => $bird['bestTime'] ?? null,
                'conservation_status' => $bird['conservationStatus'] ?? null,
                'description' => $bird['description'] ?? null,
                'image' => $bird['image'] ?? null,
            ]);
        }

        // 4. UMKM Products (Kerajinan & Makanan)
        $allUmkm = array_merge(
            $config['umkmKerajinan'] ?? [],
            $config['umkmMakanan'] ?? []
        );

        foreach ($allUmkm as $product) {
            \App\Models\UmkmProduct::create([
                'name' => $product['name'],
                'category' => $product['category'] ?? null,
                'price' => $product['price'] ?? null,
                'maker' => $product['maker'] ?? null,
                'description' => $product['description'] ?? null,
                'image' => $product['image'] ?? null,
            ]);
        }

        // 5. Tour Packages
        $this->call(TourPackageSeeder::class);
    }
}
