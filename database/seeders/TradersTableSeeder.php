<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trader; // Replace with your Trader model namespace

class TradersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example data for traders
        $traders = [
            [
                'user_id' => 3, // Assuming user with ID 1 is a trader
                'phone' => '0712345678',
                'age' => 30,
                'gender' => 'Male',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
            // Add more traders as needed
        ];

        // Insert data into the traders table
        Trader::insert($traders);
    }
}
