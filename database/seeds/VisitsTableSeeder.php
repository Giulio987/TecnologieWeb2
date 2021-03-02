<?php

use Illuminate\Database\Seeder;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([[
            'date'             => '2021\03\04',
            'time'             => '09:00',
            'id_doctor'        => '1',
            'id_patient'       => '1',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\04',
            'time'             => '09:30',
            'id_doctor'        => '1',
            'id_patient'       => '4',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\04',
            'time'             => '16:00',
            'id_doctor'        => '1',
            'id_patient'       => '5',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\04',
            'time'             => '18:30',
            'id_doctor'        => '1',
            'id_patient'       => '1',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\06',
            'time'             => '11:30',
            'id_doctor'        => '1',
            'id_patient'       => '1',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\06',
            'time'             => '10:30',
            'id_doctor'        => '1',
            'id_patient'       => '5',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\03\06',
            'time'             => '9:00',
            'id_doctor'        => '1',
            'id_patient'       => '4',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ],  [
            'date'             => '2021\02\15',
            'time'             => '15:30',
            'id_doctor'        => '1',
            'id_patient'       => '1',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ],  [
            'date'             => '2021\02\06',
            'time'             => '10:30',
            'id_doctor'        => '1',
            'id_patient'       => '1',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\02\26',
            'time'             => '10:30',
            'id_doctor'        => '1',
            'id_patient'       => '5',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'date'             => '2021\02\27',
            'time'             => '10:30',
            'id_doctor'        => '1',
            'id_patient'       => '4',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ]]);
    }
}
