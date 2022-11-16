<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Payments;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Past Payment

        Payments::create([
            'user_id' => '13',
            'accountant_id' => '3',
            'academic_year_id' => '1',

            'amount_paid' => '24581.00',
            'fee_id' => NULL,
            'others' => 'Total Fee - Full Payment',
            'balance' => '0.00',
            'payment_method' => 'Over the Counter',
            'payment_status' => 'Paid',
            'created_at' => '2021-09-13 00:48:01',
            'updated_at' => '2021-09-13 00:48:01',
        ]);

        // Current Payment - Same User

        Payments::create([
            'user_id' => '13',
            'accountant_id' => '4',
            'academic_year_id' => '2',

            'amount_paid' => '33631.00',
            'fee_id' => NULL,
            'others' => 'Total Fee - Full Payment',
            'balance' => '0.00',
            'payment_method' => 'Over the Counter',
            'payment_status' => 'Paid',
            'created_at' => '2022-08-29 01:32:54',
            'updated_at' => '2022-08-29 01:32:54',
        ]);
    }
}
