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
            'fee_name' => 'Tuition',
            'amount' => '25000.00',
            'grade_level_id' => '2',
        ]);

        Fee::create([
            'fee_name' => 'Books',
            'amount' => '10000.00',
            'grade_level_id' => NULL,
        ]);

        Fee::create([
            'fee_name' => 'Laboratory Fee',
            'amount' => '4000.00',
            'grade_level_id' => NULL,
        ]);

        Fee::create([
            'fee_name' => 'School Uniform',
            'amount' => '5000.00',
            'grade_level_id' => NULL,
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '7000.00',
            'grade_level_id' => '1',
        ]);
    }
}
