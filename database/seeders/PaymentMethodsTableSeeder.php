<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
            ['name' => 'Ship COD'],
            ['name' => 'Momo'],
            ['name' => 'Bank Transfer'],
        ];

        DB::table('payment_methods')->insert($paymentMethods);
    }
}
