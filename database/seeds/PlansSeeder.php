<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([

            'title'             => 'Starter',
            'price'             => 399,
            'image'             => 'starter.svg',
            'description'       => htmlentities("Unlimited Orders<br>Unlimited Revisions<br><strong>1 Order at a Time<strong><br><strong>1 Business Day Update</strong><br>14 Days Money Back Guarantee"),
            'btn_title'         => 'Get started',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        Plan::create([

            'title'             => 'Pro',
            'price'             => 699,
            'image'             => 'pro.svg',
            'description'       => htmlentities("Unlimited Orders<br>Unlimited Revisions<br><strong>2 Order at a Time<strong><br><strong>Faster Turnaround</strong><br>14 Days Money Back Guarantee"),
            'btn_title'         => 'Get started',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        Plan::create([

            'title'             => 'Agencies',
            'price'             => 0,
            'image'             => 'agency.svg',
            'description'       => htmlentities("Unlimited Orders<br>Unlimited Revisions<br><strong>X Orders at a Time</strong><br><strong>Dedicated Account Manager</strong><br>Priority Support<br>14 Days Money Back Guarantee"),
            'btn_title'         => 'Contact us',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

    }
}
