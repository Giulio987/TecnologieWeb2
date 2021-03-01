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
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000001',
            'id_doctor'     => '4',
            'description'   => 'cardioaspirin',
            'status'        => 'convalidare',
            'type'          => 'farmaco',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000002',
            'id_doctor'     => '4',
            'description'   => 'enterogermina',
            'status'        => 'convalidare',
            'type'          => 'farmaco',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000003',
            'id_doctor'     => '4',
            'description'   => 'angiologica',
            'status'        => 'convalidare',
            'type'          => 'visita',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000004',
            'id_doctor'     => '4',
            'description'   => 'cardiochirurgica',
            'status'        => 'convalidata',
            'type'          => 'visita',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000005',
            'id_doctor'     => '4',
            'description'   => 'chirurgica oncologica',
            'status'        => 'invalidata',
            'type'          => 'visita',
            'date'          => date('Y-m-d'),
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ]]);
    }
}
