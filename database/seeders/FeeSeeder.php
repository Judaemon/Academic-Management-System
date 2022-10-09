<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fee::create([
            'fee_name' => 'Tuition Fee',
            'amount' => '25640.00',
        ]);

        Fee::create([
            'fee_name' => 'School Uniform',
            'amount' => '500.00',
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '5453.75',
        ]);
    }
}
