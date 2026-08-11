# Project Rules - Kampung Saporkren Laravel

## Database & Migration Rules
- **Sebelum menjalankan migrasi database (`php artisan migrate:fresh` atau mengubah skema database)**: Selalu cek dan perbarui data pada Seeder (`DatabaseSeeder.php`, `TourPackageSeeder.php`, atau file seeder terkait) menggunakan data terbaru yang ada di database saat itu agar data masukan user tidak hilang saat migrasi ulang.
