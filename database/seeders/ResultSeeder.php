<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    public function run()
    {
        Result::factory(20)->create();
    }
}
