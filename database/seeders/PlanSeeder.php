<?php

namespace Database\Seeders;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter Plan',
                'slug' => 'starter-plan',
                'price' => 2000,
                'stripe_plan_id' => null,
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ], [
                'name' => 'Professional Plan',
                'slug' => 'professional-plan',
                'price' => 5000,
                'stripe_plan_id' => null,
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];
        Plan::insert($plans);
    }
}
