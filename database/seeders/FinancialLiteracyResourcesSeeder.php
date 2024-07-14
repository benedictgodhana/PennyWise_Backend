<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FinancialLiteracyResource;

class FinancialLiteracyResourcesSeeder extends Seeder
{
    public function run()
    {
        FinancialLiteracyResource::create([
            'title' => 'Introduction to Financial Literacy',
            'content' => 'This article provides an introduction to financial literacy.',
        ]);

        FinancialLiteracyResource::create([
            'title' => 'Budgeting Techniques',
            'content' => 'Learn effective budgeting techniques to manage your finances.',
        ]);
    }
}
