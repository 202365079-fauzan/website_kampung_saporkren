<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\TourPackage;

$packages = TourPackage::all();
foreach($packages as $package) {
    if (is_string($package->price) && !is_numeric($package->price)) {
        // Strip everything except numbers
        $cleaned = preg_replace('/[^0-9]/', '', $package->price);
        if (!empty($cleaned)) {
            $package->price = (int) $cleaned;
            $package->save();
        }
    }
}
echo "Database prices updated successfully!\n";
