<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;
use App\Models\Trader;
use Carbon\Carbon;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all traders
        $traders = Trader::all();

        // Iterate through each trader
        foreach ($traders as $trader) {
            // Create a business for each trader
            Business::create([
                'trader_id' => 1, // Use the trader's actual ID
                'name' => 'Mama Mboga', // Replace with actual business name
                'type' => 'Retail', // Replace with actual business type
                'location' => 'Nairobi', // Replace with actual business location
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
