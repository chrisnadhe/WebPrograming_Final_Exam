<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'chrisna@admin.com',
            'password' => bcrypt('secret')
        ]);

        DB::table('barang')->insert([
            'product_name' => 'Tas 25L',
            'brand' => 'eiger',
            'price' => '350000',
            'model_no' => 'SK023',
        ]);

        DB::table('barang')->insert([
            'product_name' => 'Topi',
            'brand' => 'eiger',
            'price' => '35000',
            'model_no' => 'SK026',
        ]);
    }
}
