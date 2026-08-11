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
        $backupPath = database_path('seeders/db_backup.json');

        if (file_exists($backupPath)) {
            $backupData = json_decode(file_get_contents($backupPath), true);

            // 0. Admin User
            if (!empty($backupData['users'])) {
                foreach ($backupData['users'] as $user) {
                    \App\Models\User::updateOrCreate(
                        ['email' => $user['email']],
                        [
                            'name' => $user['name'],
                            'username' => $user['username'] ?? 'kampung_saporkren',
                            'password' => 'Wils0nB0tak',
                        ]
                    );
                }
            } else {
                \App\Models\User::updateOrCreate([
                    'email' => 'admin@saporkren.com',
                ], [
                    'name' => 'Admin Saporkren',
                    'username' => 'kampung_saporkren',
                    'password' => 'Wils0nB0tak',
                ]);
            }

            // 1. Homestays
            if (!empty($backupData['homestays'])) {
                foreach ($backupData['homestays'] as $homestay) {
                    \App\Models\Homestay::updateOrCreate(
                        ['id' => $homestay['id']],
                        [
                            'name' => $homestay['name'],
                            'owner' => $homestay['owner'] ?? null,
                            'capacity' => $homestay['capacity'] ?? null,
                            'short_description' => $homestay['short_description'] ?? null,
                            'facilities' => $homestay['facilities'] ?? [],
                            'price' => $homestay['price'] ?? null,
                            'image' => $homestay['image'] ?? null,
                            'maps_link' => $homestay['maps_link'] ?? null,
                        ]
                    );
                }
            }

            // 2. Tour Guides
            if (!empty($backupData['tourGuides'])) {
                foreach ($backupData['tourGuides'] as $guide) {
                    \App\Models\TourGuide::updateOrCreate(
                        ['id' => $guide['id']],
                        [
                            'name' => $guide['name'],
                            'specialty' => $guide['specialty'] ?? null,
                            'languages' => $guide['languages'] ?? null,
                            'experience' => $guide['experience'] ?? null,
                            'transport' => $guide['transport'] ?? null,
                            'description' => $guide['description'] ?? null,
                            'image' => $guide['image'] ?? null,
                        ]
                    );
                }
            }

            // 3. Bird Species
            if (!empty($backupData['birdSpecies'])) {
                foreach ($backupData['birdSpecies'] as $bird) {
                    \App\Models\BirdSpecies::updateOrCreate(
                        ['id' => $bird['id']],
                        [
                            'local_name' => $bird['local_name'],
                            'latin_name' => $bird['latin_name'] ?? null,
                            'habitat' => $bird['habitat'] ?? null,
                            'best_time' => $bird['best_time'] ?? null,
                            'conservation_status' => $bird['conservation_status'] ?? null,
                            'description' => $bird['description'] ?? null,
                            'image' => $bird['image'] ?? null,
                        ]
                    );
                }
            }

            // 4. UMKM Products
            if (!empty($backupData['umkmProducts'])) {
                foreach ($backupData['umkmProducts'] as $product) {
                    \App\Models\UmkmProduct::updateOrCreate(
                        ['id' => $product['id']],
                        [
                            'name' => $product['name'],
                            'category' => $product['category'] ?? null,
                            'price' => $product['price'] ?? null,
                            'maker' => $product['maker'] ?? null,
                            'description' => $product['description'] ?? null,
                            'image' => $product['image'] ?? null,
                        ]
                    );
                }
            }

            // 5. Tour Packages
            if (!empty($backupData['tourPackages'])) {
                foreach ($backupData['tourPackages'] as $package) {
                    \App\Models\TourPackage::updateOrCreate(
                        ['id' => $package['id']],
                        [
                            'name' => $package['name'],
                            'type' => $package['type'] ?? null,
                            'duration' => $package['duration'] ?? null,
                            'price' => $package['price'] ?? null,
                            'price_speedboat' => $package['price_speedboat'] ?? null,
                            'includes' => $package['includes'] ?? null,
                        ]
                    );
                }
            } else {
                $this->call(TourPackageSeeder::class);
            }

            // 6. Sample Initial Reviews for Homestays & UMKM if empty
            if (\App\Models\Review::count() === 0) {
                $firstHomestay = \App\Models\Homestay::first();
                if ($firstHomestay) {
                    \App\Models\Review::create([
                        'reviewable_type' => \App\Models\Homestay::class,
                        'reviewable_id' => $firstHomestay->id,
                        'name' => 'Budi Santoso',
                        'rating' => 5,
                        'comment' => 'Homestay sangat bersih, pemandangan pantai langsung dari halaman depan! Pelayanan Pak Dori sangat ramah.',
                    ]);
                    \App\Models\Review::create([
                        'reviewable_type' => \App\Models\Homestay::class,
                        'reviewable_id' => $firstHomestay->id,
                        'name' => 'Siti Rahma',
                        'rating' => 5,
                        'comment' => 'Suasana tenang dan makanan olahan lokalnya lezat sekali. Sangat direkomendasikan untuk liburan keluarga.',
                    ]);
                }

                $firstUmkm = \App\Models\UmkmProduct::first();
                if ($firstUmkm) {
                    \App\Models\Review::create([
                        'reviewable_type' => \App\Models\UmkmProduct::class,
                        'reviewable_id' => $firstUmkm->id,
                        'name' => 'Dewi Anggraini',
                        'rating' => 5,
                        'comment' => 'Produk kerajinan ukiran sangat halus dan authentic! Pengemasan rapi untuk kenang-kenangan.',
                    ]);
                }
            }

            return;
        }

        $config = config('saporkren');

        // Admin User
        \App\Models\User::updateOrCreate([
            'email' => 'admin@saporkren.com',
        ], [
            'name' => 'Admin Saporkren',
            'username' => 'kampung_saporkren',
            'password' => 'Wils0nB0tak',
        ]);

        // 1. Homestays
        foreach ($config['homestays'] as $homestay) {
            \App\Models\Homestay::create([
                'name' => $homestay['name'],
                'owner' => $homestay['owner'] ?? null,
                'capacity' => $homestay['capacity'] ?? null,
                'short_description' => $homestay['short_description'] ?? null,
                'facilities' => $homestay['facilities'] ?? [],
                'price' => $homestay['price'] ?? null,
                'image' => $homestay['mainPhoto'] ?? null,
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
                'image' => $guide['photo'] ?? null,
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

        // 6. Sample Initial Reviews for Homestays & UMKM
        if (\App\Models\Review::count() === 0) {
            $firstHomestay = \App\Models\Homestay::first();
            if ($firstHomestay) {
                \App\Models\Review::create([
                    'reviewable_type' => \App\Models\Homestay::class,
                    'reviewable_id' => $firstHomestay->id,
                    'name' => 'Budi Santoso',
                    'rating' => 5,
                    'comment' => 'Homestay sangat bersih, pemandangan pantai langsung dari halaman depan! Pelayanan Pak Dori sangat ramah.',
                    'admin_reply' => 'Terima kasih banyak Bapak Budi Santoso atas ulasan dan kunjungannya! Ditunggu kedatangannya kembali di Kampung Saporkren.',
                    'replied_at' => now(),
                ]);
                \App\Models\Review::create([
                    'reviewable_type' => \App\Models\Homestay::class,
                    'reviewable_id' => $firstHomestay->id,
                    'name' => 'Siti Rahma',
                    'rating' => 5,
                    'comment' => 'Suasana tenang dan makanan olahan lokalnya lezat sekali. Sangat direkomendasikan untuk liburan keluarga.',
                ]);
            }

            $firstUmkm = \App\Models\UmkmProduct::first();
            if ($firstUmkm) {
                \App\Models\Review::create([
                    'reviewable_type' => \App\Models\UmkmProduct::class,
                    'reviewable_id' => $firstUmkm->id,
                    'name' => 'Dewi Anggraini',
                    'rating' => 5,
                    'comment' => 'Produk kerajinan ukiran sangat halus dan authentic! Pengemasan rapi untuk kenang-kenangan.',
                ]);
            }
        }
    }
}
