<?php

use Illuminate\Database\Seeder;

class PrescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prescriptions')->insert([[
            'id_patient'    => '1',
            'rfe'           => '120000000000000',
            'id_doctor'     => '4',
            'description'   => 'oki',
            'status'        => 'convalidata',
            'type'          => 'farmaco',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ]]);
    }
}
