<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['lainnya'],
            'name' => 'KUPLUK BOOGIE ORIGINAL',
            'sku' => 'KGB',
            'description' => 'kupluk boogie original untuk naek gunung atau passion',
            'price' => 65000,
            'stock' => 16,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p1->id, 'path' => 'products/KUPLUK BOOGIE ORIGINAL/83a80ede-9900-4cb5-bb0b-64dac5302d9d.jpg']);
        ProductPhoto::create(['product_id' => $p1->id, 'path' => 'products/KUPLUK BOOGIE ORIGINAL/583913c8-96dc-4048-8727-4a25b0a4214c.jpg']);
        ProductPhoto::create(['product_id' => $p1->id, 'path' => 'products/KUPLUK BOOGIE ORIGINAL/c9aed821-4350-4e7d-bacd-e621df873c56.jpg']);
        ProductPhoto::create(['product_id' => $p1->id, 'path' => 'products/KUPLUK BOOGIE ORIGINAL/ca975599-a3e8-40cf-9936-1693491493e8.jpg']);

        $p2 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['lainnya'],
            'name' => 'SARUNG TANGAN BOOGIE FULL GUNUNG & Motor',
            'sku' => '',
            'description' => 'sarung tangan full untuk gunung maupun motor serta nyaman d gunakan',
            'price' => 123000,
            'stock' => 16,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p2->id, 'path' => 'products/SARUNG TANGAN BOOGIE FULL GUNUNG & Motor/2f47faaf-3238-449d-9cde-05f3b1863b6f.jpg']);
        ProductPhoto::create(['product_id' => $p2->id, 'path' => 'products/SARUNG TANGAN BOOGIE FULL GUNUNG & Motor/3b4dbb6d-67ae-4cbe-840b-82892839ac29.jpg']);
        ProductPhoto::create(['product_id' => $p2->id, 'path' => 'products/SARUNG TANGAN BOOGIE FULL GUNUNG & Motor/58d27dc4-0dd6-4bee-8bf5-7efb695dabb0.jpg']);
        ProductPhoto::create(['product_id' => $p2->id, 'path' => 'products/SARUNG TANGAN BOOGIE FULL GUNUNG & Motor/cefc5f85-5bde-48e6-b145-c7f4ca995d30.jpg']);

        $p3 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['tas'],
            'name' => 'COVERBAG CONSINA 60L',
            'sku' => 'CBCSN60',
            'description' => 'coverbag consina original 60L',
            'price' => 79000,
            'stock' => 15,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p3->id, 'path' => 'products/COVERBAG CONSINA 60L/7a08d9e4-afaf-4ac1-9441-9e5772d651b0.jpg']);
        ProductPhoto::create(['product_id' => $p3->id, 'path' => 'products/COVERBAG CONSINA 60L/2751efb0-a874-4dde-ad0a-c805c6250081.jpg']);
        ProductPhoto::create(['product_id' => $p3->id, 'path' => 'products/COVERBAG CONSINA 60L/cbb9f65e-a05d-4ef3-b5a9-b949fe3d7f8f.jpg']);
        ProductPhoto::create(['product_id' => $p3->id, 'path' => 'products/COVERBAG CONSINA 60L/ddd76bda-d74f-4f97-8538-5c27fe396693.jpg']);

        $p4 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['alatTenda'],
            'name' => 'TENDA GUNUNG CAMPING KOMPASS KAPASITAS 4 SAMPAI 6 ORANG',
            'sku' => 'TKK4',
            'description' => 'seperangkat tenda gunung serta partisi seperti pasak dll',
            'price' => 790000,
            'stock' => 15,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p4->id, 'path' => 'products/TENDA GUNUNG CAMPING KOMPASS KAPASITAS 4 SAMPAI 6 ORANG/50cdb79b-bfd9-4b9c-b7fe-381fc292e6aa.jpg']);
        ProductPhoto::create(['product_id' => $p4->id, 'path' => 'products/TENDA GUNUNG CAMPING KOMPASS KAPASITAS 4 SAMPAI 6 ORANG/972b4ac9-9895-41ca-8a97-08b4ff0964b9.jpg']);
        ProductPhoto::create(['product_id' => $p4->id, 'path' => 'products/TENDA GUNUNG CAMPING KOMPASS KAPASITAS 4 SAMPAI 6 ORANG/36257ff1-e3ec-45ca-9ef3-d6bbcfa2e7cd.jpg']);
        ProductPhoto::create(['product_id' => $p4->id, 'path' => 'products/TENDA GUNUNG CAMPING KOMPASS KAPASITAS 4 SAMPAI 6 ORANG/c7229636-609a-4d56-87c0-b638ccdb9449.jpg']);

        $p5 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['tas'],
            'name' => 'CARRIER NOGALES CONSINA 60L AIRCOMFORT',
            'sku' => 'CRCSNGLS',
            'description' => 'original barang baru dan hanya tersisa warna hitam',
            'price' => 980000,
            'stock' => 6,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p5->id, 'path' => 'products/CARRIER NOGALES CONSINA 60L AIRCOMFORT/1135c6d3-5bf1-46bc-b4fa-8ec3abbdaee4.jpg']);
        ProductPhoto::create(['product_id' => $p5->id, 'path' => 'products/CARRIER NOGALES CONSINA 60L AIRCOMFORT/ae3da552-aacb-48cf-abea-5190847dfec7.jpg']);
        ProductPhoto::create(['product_id' => $p5->id, 'path' => 'products/CARRIER NOGALES CONSINA 60L AIRCOMFORT/d5980a47-8f49-4028-aa6c-88925520c823.jpg']);
        ProductPhoto::create(['product_id' => $p5->id, 'path' => 'products/CARRIER NOGALES CONSINA 60L AIRCOMFORT/e54d2a1e-8266-4bda-88db-db90954d6de9.jpg']);

        $p6 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['tas'],
            'name' => 'CARRIER ATAU SEMI CARRIER DEUTER AC AERA 22L',
            'sku' => 'DA22',
            'description' => 'barang original dan tersedia coverbag',
            'price' => 1500000,
            'stock' => 6,
            'weight' => 2.0
        ]);

        ProductPhoto::create(['product_id' => $p6->id, 'path' => 'products/CARRIER ATAU SEMI CARRIER DEUTER AC AERA 22L/9ef15322-5e3a-4133-ac45-19aa4d002689.jpg']);
        ProductPhoto::create(['product_id' => $p6->id, 'path' => 'products/CARRIER ATAU SEMI CARRIER DEUTER AC AERA 22L/d8084e82-b38f-4349-89c0-a5abf80a19fa.jpg']);
        ProductPhoto::create(['product_id' => $p6->id, 'path' => 'products/CARRIER ATAU SEMI CARRIER DEUTER AC AERA 22L/ecbb6771-92c1-4d5e-8301-1cb4dedcc2f4.jpg']);

        $p7 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['sepatu'],
            'name' => 'SANDAL JEPIT GUNUNG TERMURAH OUTDOOR PRO ARFSK VX',
            'sku' => 'SOPAVX',
            'description' => 'produk original tahan lama awet dan anti slik nyaman di gunakan',
            'price' => 165000,
            'stock' => 12,
            'weight' => 1.0
        ]);

        ProductPhoto::create(['product_id' => $p7->id, 'path' => 'products/SANDAL JEPIT GUNUNG TERMURAH OUTDOOR PRO ARFSK VX/8926d749-faab-461b-9af5-3c52bf5b59e5.jpg']);
        ProductPhoto::create(['product_id' => $p7->id, 'path' => 'products/SANDAL JEPIT GUNUNG TERMURAH OUTDOOR PRO ARFSK VX/148f19be-7a0c-4013-b554-ff8888c74d8c.jpg']);

        $p8 = Product::create([
            'category_id' => CategorySeeder::$categoryIds['lainnya'],
            'name' => 'SABUK OUTDOOR ATAU BELT BOOGIE',
            'sku' => 'SB01',
            'description' => 'Barang original dan berkwalitas',
            'price' => 79000,
            'stock' => 120,
            'weight' => 0.5
        ]);

        ProductPhoto::create(['product_id' => $p8->id, 'path' => 'products/SABUK OUTDOOR ATAU BELT BOOGIE/0686bfbf-988b-4237-b95a-a6c16e27d0d4.jpg']);
        ProductPhoto::create(['product_id' => $p8->id, 'path' => 'products/SABUK OUTDOOR ATAU BELT BOOGIE/6629079b-f0d5-4ec1-8538-f67f6d6a11ba.jpg']);
    }
}
