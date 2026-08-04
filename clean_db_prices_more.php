<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\UmkmProduct;
use App\Models\Homestay;

$umkms = UmkmProduct::all();
foreach($umkms as $item) {
    if (is_string($item->price) && !is_numeric($item->price)) {
        // Strip everything except numbers
        $cleaned = preg_replace('/[^0-9]/', '', $item->price);
        if (!empty($cleaned)) {
            $item->price = (int) $cleaned;
            $item->save();
        }
    }
}

$homestays = Homestay::all();
foreach($homestays as $item) {
    if (is_string($item->price) && !is_numeric($item->price)) {
        // Strip everything except numbers
        $cleaned = preg_replace('/[^0-9]/', '', $item->price);
        if (!empty($cleaned)) {
            $item->price = (int) $cleaned;
            $item->save();
        }
    }
}

echo "Database prices updated successfully for UMKM and Homestay!\n";
