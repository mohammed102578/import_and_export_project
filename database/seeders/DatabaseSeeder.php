<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(LaratrustSeeder::class);
////      $this->call(CategorySeeder::class);
////      $this->call(VendorSeeder::class);
////        $this->call(BranchSeeder::class);
////        $this->call(CategoryBranchSeeder::class);
////        $this->call(ItemSeeder::class);
////        $this->call(OfferSeeder::class);
////        $this->call(OfferDetailSeeder::class);
////        $this->call(ContentSeeder::class);
////        $this->call(BranchItemSeeder::class);
//
//
//        $this->call(UserTableSeeder::class);
    }
}
