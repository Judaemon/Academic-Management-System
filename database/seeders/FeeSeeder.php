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
            'academic_year_id' => '1',
        ]);

        Fee::create([
            'fee_name' => 'School Uniform',
            'amount' => '500.00',
            'academic_year_id' => NULL,
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '5453.75',
            'academic_year_id' => NULL,
        ]);
    }
}
