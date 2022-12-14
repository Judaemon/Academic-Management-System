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
            'amount' => '15081.00',
            'grade_level_id' => '1',
        ]);

        Fee::create([
            'fee_name' => 'Books',
            'amount' => '6500.00',
            'grade_level_id' => '1',
        ]);

        Fee::create([
            'fee_name' => 'Laboratory Fee',
            'amount' => '1500.00',
            'grade_level_id' => '1',
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '1500.00',
            'grade_level_id' => '1',
        ]);
        
        Fee::create([
            'fee_name' => 'Tuition',
            'amount' => '19631.00',
            'grade_level_id' => '2',
        ]);

        Fee::create([
            'fee_name' => 'Books',
            'amount' => '9000.00',
            'grade_level_id' => '2',
        ]);

        Fee::create([
            'fee_name' => 'Laboratory Fee',
            'amount' => '2500.00',
            'grade_level_id' => '2',
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '2500.00',
            'grade_level_id' => '2',
        ]);

        Fee::create([
            'fee_name' => 'Tuition',
            'amount' => '25000.00',
            'grade_level_id' => '3',
        ]);

        Fee::create([
            'fee_name' => 'Books',
            'amount' => '10000.00',
            'grade_level_id' => '3',
        ]);

        Fee::create([
            'fee_name' => 'Laboratory Fee',
            'amount' => '4000.00',
            'grade_level_id' => '3',
        ]);

        Fee::create([
            'fee_name' => 'Miscellaneous Fee',
            'amount' => '7000.00',
            'grade_level_id' => '3',
        ]);

        Fee::create([
            'fee_name' => 'School Uniform',
            'amount' => '5000.00',
            'grade_level_id' => NULL,
        ]);

        Fee::create([
            'fee_name' => 'School ID',
            'amount' => '100.00',
            'grade_level_id' => NULL,
        ]);
    }
}
