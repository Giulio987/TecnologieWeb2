<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([[
        'fiscal_code'   => 'CHNLDE02H52B429N',
        'gender'        => 'F',
        'dob'           => '1980-12-21',
        'phone_number'  => '051879211',
        'id_building'   => '1',
        'id_user'       => '4',
        'updated_at'    => date('Y-m-d h:s:i'),
        'created_at'    => date('Y-m-d h:s:i')
    ], [
        'fiscal_code'   => 'CHLLVC92M47C950A',
        'gender'        => 'F',
        'dob'           => '1973-08-27',
        'phone_number'  => '053277904',
        'id_building'   => '3',
        'id_user'       => '5',
        'updated_at'    => date('Y-m-d h:s:i'),
        'created_at'    => date('Y-m-d h:s:i')
    ], [    
        'fiscal_code'   => 'CLVSDI28P61D491Y',
        'gender'        => 'F',
        'dob'           => '1983-07-21',
        'phone_number'  => '051634292',
        'id_building'   => '2',
        'id_user'       => '6',
        'updated_at'    => date('Y-m-d h:s:i'),
        'created_at'    => date('Y-m-d h:s:i')
    ], [
        'fiscal_code'   => 'PRSTQT83D22C338N',
        'gender'        => 'M',
        'dob'           => '1985-03-25',
        'phone_number'  => '051955064',
        'id_building'   => '2',
        'id_user'       => '7',
        'updated_at'    => date('Y-m-d h:s:i'),
        'created_at'    => date('Y-m-d h:s:i')
        
    ],[
        'fiscal_code'   => 'BNCCTN08R06B859V',
        'gender'        => 'M',
        'dob'           => '1964-07-19',
        'phone_number'  => '0532380540',
        'id_building'   => '3',
        'id_user'       => '8',
        'updated_at'    => date('Y-m-d h:s:i'),
        'created_at'    => date('Y-m-d h:s:i')
        ]]);
    }
}