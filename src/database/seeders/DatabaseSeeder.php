<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory()
            ->has(
                WeightLog::factory()->count(35),
                'weightLogs'
            )
            ->has(
                WeightTarget::factory(),
                'weightTarget'
            )
            ->create();
    }
}
