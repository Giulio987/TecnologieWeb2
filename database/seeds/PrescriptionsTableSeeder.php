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
            'id_doctor'     => '1',
            'description'   => 'oki',
            'status'        => 'convalidata',
            'type'          => 'farmaco',
            'date'          => '2021/01/28',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '0',
            'id_doctor'     => '1',
            'description'   => 'cardioaspirin',
            'status'        => 'convalidare',
            'type'          => 'farmaco',
            'date'          => '2021/02/28',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '0',
            'id_doctor'     => '1',
            'description'   => 'enterogermina',
            'status'        => 'convalidare',
            'type'          => 'farmaco',
            'date'          => '2021/03/02',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '0',
            'id_doctor'     => '1',
            'description'   => 'angiologica',
            'status'        => 'convalidare',
            'type'          => 'visita',
            'date'          => '2021/03/01',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '120000000000004',
            'id_doctor'     => '1',
            'description'   => 'cardiochirurgica',
            'status'        => 'convalidata',
            'type'          => 'visita',
            'date'          => '2020/09/30',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ],[
            'id_patient'    => '1',
            'rfe'           => '0',
            'id_doctor'     => '1',
            'description'   => 'chirurgica oncologica',
            'status'        => 'invalidata',
            'type'          => 'visita',
            'date'          => '2021/01/14',
            'updated_at'    => date('Y-m-d h:s:i'),
            'created_at'    => date('Y-m-d h:s:i')
        ]]);
    }
}
