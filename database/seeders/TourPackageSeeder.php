<?php

namespace Database\Seeders;

use App\Models\TourPackage;
use Illuminate\Database\Seeder;

class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Paket Island Hopping (1 Day - 6 Day) [Type: tour_5_pulau]
        $tour5Pulau = [
            [
                'name' => '1 Day Trip',
                'type' => 'island_hopping',
                'duration' => '1 Day Trip',
                'price' => 2000000,
                'price_speedboat' => 3500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Makan siang', 'Peralatan snorkeling'],
                ],
            ],
            [
                'name' => '2 Days 1 Night Trip',
                'type' => 'island_hopping',
                'duration' => '2 Days 1 Night',
                'price' => 4500000,
                'price_speedboat' => 7000000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Pemandu'],
                ],
            ],
            [
                'name' => '3 Days 2 Nights Trip',
                'type' => 'island_hopping',
                'duration' => '3 Days 2 Nights',
                'price' => 6800000,
                'price_speedboat' => 10000000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Pemandu Senior'],
                ],
            ],
            [
                'name' => '4 Days 3 Nights Trip',
                'type' => 'island_hopping',
                'duration' => '4 Days 3 Nights',
                'price' => 9000000,
                'price_speedboat' => 13500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Dokumentasi'],
                ],
            ],
            [
                'name' => '5 Days 4 Nights Trip',
                'type' => 'island_hopping',
                'duration' => '5 Days 4 Nights',
                'price' => 11200000,
                'price_speedboat' => 16500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x Penuh', 'Peralatan snorkeling & Speedboat Excursion'],
                ],
            ],
            [
                'name' => '6 Days 5 Nights Trip',
                'type' => 'island_hopping',
                'duration' => '6 Days 5 Nights',
                'price' => 13500000,
                'price_speedboat' => 19500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x Penuh', 'Peralatan snorkeling, Pemandu & Foto/Video'],
                ],
            ],
        ];

        foreach ($tour5Pulau as $package) {
            TourPackage::create($package);
        }



        // 3. Paket Snorkeling Trip Ke Pulau [Type: snorkeling] - 10 Items Sesuai Gambar
        $snorkeling = [
            [
                'name' => 'Friwen Well',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 250000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Batu Lima',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 300000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Sawandarek Jetty',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 1000000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Pasir Timbul Sandbank',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 600000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Arborek',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 1500000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Kabui Wall',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 1500000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Pianemo',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 4000000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Yenbuba Jetty',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 700000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Mioskun',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 400000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Kali Biru (Blue River) Trip in Warsambin',
                'type' => 'snorkeling_trip',
                'duration' => '1 Hari',
                'price' => 2500000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
        ];

        foreach ($snorkeling as $package) {
            TourPackage::create($package);
        }

        // 4. Paket Bird Watching [Type: bird_watching]
        $birdWatching = [
            [
                'name' => 'Morning Birding Spotting',
                'type' => 'bird_watching',
                'duration' => '3 - 4 Jam (Pagi)',
                'price' => 250000,
                'includes' => ['Pemandu Birding Lokal', 'Akses Masuk Hutan Konservasi', 'Kopi / Teh Pagi', 'Pendampingan Jalur Tracking'],
            ],
            [
                'name' => 'Full Day Birding Expedition',
                'type' => 'bird_watching',
                'duration' => '1 Hari Penuh',
                'price' => 800000,
                'includes' => ['Pemandu Birding Lokal Senior', 'Akses Semua Spot Pengamatan', 'Makan Siang & Snack', 'Air Mineral & Logistik Hutan'],
            ],
        ];

        foreach ($birdWatching as $package) {
            TourPackage::create($package);
        }
    }
}
