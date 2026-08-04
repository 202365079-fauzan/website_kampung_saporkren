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
        // 1. Paket Tour ke 5 Pulau (1 Day - 6 Day) [Type: tour_5_pulau]
        $tour5Pulau = [
            [
                'name' => '1 Day Trip',
                'type' => 'tour_5_pulau',
                'duration' => '1 Day Trip',
                'price' => 2000000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Makan siang', 'Peralatan snorkeling'],
                ],
            ],
            [
                'name' => '2 Days 1 Night Trip',
                'type' => 'tour_5_pulau',
                'duration' => '2 Days 1 Night',
                'price' => 4500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Pemandu'],
                ],
            ],
            [
                'name' => '3 Days 2 Nights Trip',
                'type' => 'tour_5_pulau',
                'duration' => '3 Days 2 Nights',
                'price' => 6800000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Pemandu Senior'],
                ],
            ],
            [
                'name' => '4 Days 3 Nights Trip',
                'type' => 'tour_5_pulau',
                'duration' => '4 Days 3 Nights',
                'price' => 9000000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x', 'Peralatan snorkeling & Dokumentasi'],
                ],
            ],
            [
                'name' => '5 Days 4 Nights Trip',
                'type' => 'tour_5_pulau',
                'duration' => '5 Days 4 Nights',
                'price' => 11200000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x Penuh', 'Peralatan snorkeling & Speedboat Excursion'],
                ],
            ],
            [
                'name' => '6 Days 5 Nights Trip',
                'type' => 'tour_5_pulau',
                'duration' => '6 Days 5 Nights',
                'price' => 13500000,
                'includes' => [
                    'islands' => ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'],
                    'items' => ['1 – 4 orang', 'Homestay & Makan 3x Penuh', 'Peralatan snorkeling, Pemandu & Foto/Video'],
                ],
            ],
        ];

        foreach ($tour5Pulau as $package) {
            TourPackage::create($package);
        }

        // 2. Paket Trip Ke Pulau [Type: trip]
        $tripPulau = [
            [
                'name' => 'Piaynemo & Telaga Bintang',
                'type' => 'trip',
                'duration' => '1 Hari',
                'price' => 3500000,
                'includes' => ['Pemandu Lokal', 'BBM Perahu', 'Life Vest', 'Air Mineral'],
            ],
            [
                'name' => 'Wayag Island & Peak Wayag',
                'type' => 'trip',
                'duration' => '1 Hari',
                'price' => 8500000,
                'includes' => ['Pemandu Lokal', 'BBM Ekspedisi', 'Life Vest', 'Makan Siang'],
            ],
            [
                'name' => 'Teluk Kabui & Batu Pensil',
                'type' => 'trip',
                'duration' => 'Setengah Hari',
                'price' => 2200000,
                'includes' => ['Pemandu Lokal', 'BBM Perahu', 'Pengamatan Karst'],
            ],
            [
                'name' => 'Pasir Timbul & Pulau Mansuar',
                'type' => 'trip',
                'duration' => 'Setengah Hari',
                'price' => 1800000,
                'includes' => ['Pemandu Lokal', 'BBM Perahu', 'Dokumentasi'],
            ],
            [
                'name' => 'Friwen Island & Sawinggrai',
                'type' => 'trip',
                'duration' => '1 Hari',
                'price' => 2000000,
                'includes' => ['Pemandu Lokal', 'BBM Perahu', 'Pakan Ikan'],
            ],
        ];

        foreach ($tripPulau as $package) {
            TourPackage::create($package);
        }

        // 3. Paket Trip Snorkeling Ke Pulau [Type: snorkeling] - 10 Items Sesuai Gambar
        $snorkeling = [
            [
                'name' => 'Friwen Well',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 250000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Batu Lima',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 300000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Sawandarek Jetty',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 1000000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Pasir Timbul Sandbank',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 600000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Arborek',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 1500000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Kabui Wall',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 1500000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Pianemo',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 4000000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Yenbuba Jetty',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 700000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Mioskun',
                'type' => 'snorkeling',
                'duration' => '1 Hari',
                'price' => 400000,
                'includes' => ['info' => '1 - 4 orang'],
            ],
            [
                'name' => 'Kali Biru (Blue River) Trip in Warsambin',
                'type' => 'snorkeling',
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
