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
                'price' => 1000,
                'stripe_plan_id' => 'price_1MMb8RH0VcM2Ahkycj5kK9za',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ], [
                'name' => 'Professional Plan',
                'slug' => 'professional-plan',
                'price' => 1900,
                'stripe_plan_id' => 'price_1MMb9hH0VcM2AhkyYlQGwZ0P',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],[ 'name'=>'Business Plan',
                'slug' => 'business-plan',
                'price' => 3500,
                'stripe_plan_id' => 'price_1MMbAbH0VcM2AhkyAuqNXLCJ',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
        ];
        Plan::insert($plans);
    }
}
