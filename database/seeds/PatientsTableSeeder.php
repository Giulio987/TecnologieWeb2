<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([[
            'fiscal_code'        => 'BGNDRO62S65I321M',
            'dob'                => '1961-11-23',
            'phone_number'       => '0510848581',
            'gender'             => 'F',
            'street_address'     => 'Via P.Bonfante',
            'street_number'      => '248/b',
            'postal_code'        => '40121',
            'city'               => 'Bologna',
            'id_doctor'          => '1',
            'id_user'            => '9',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
        
            'fiscal_code'        => 'BGNMDL40C66A784V',
            'dob'                => '1962-03-01',
            'phone_number'       => '0510848576',
            'gender'             => 'F',
            'street_address'     => 'Via Brianza',
            'street_number'      => '33',
            'postal_code'        => '40121',
            'city'               => 'Bologna',
            'id_doctor'          => '4',
            'id_user'            => '10',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BLLVTR66L12I606G',
            'dob'                => '1965-02-17',
            'phone_number'       => '0510656042',
            'gender'             => 'M',
            'street_address'     => 'Via A.Giordano',
            'street_number'      => '186',
            'postal_code'        => '40121',
            'city'               => 'Bologna',
            'id_doctor'          => '3',
            'id_user'            => '11',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BLRTZN99D54E432Q',
            'dob'                => '1984-03-05',
            'phone_number'       => '0510848579',
            'gender'             => 'F',
            'street_address'     => 'Via A.Garibaldi',
            'street_number'      => '179/e',
            'postal_code'        => '40121',
            'city'               => 'Bologna',
            'id_doctor'          => '1',
            'id_user'            => '12',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BNFLSS64D62I219J',
            'dob'                => '1965-02-17',
            'phone_number'       => '0510848582',
            'gender'             => 'F',
            'street_address'     => 'Via Afrodite',
            'street_number'      => '292',
            'postal_code'        => '40121',
            'city'               => 'Bologna',
            'id_doctor'          => '1',
            'id_user'            => '13',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BNSTLD95M15E622F',
            'dob'                => '1986-01-31',
            'phone_number'       => '0510848585',
            'gender'             => 'M',
            'street_address'     => 'Via F.Riso',
            'street_number'      => '211/h',
            'postal_code'        => '44100',
            'city'               => 'Ferrara',
            'id_doctor'          => '2',
            'id_user'            => '14',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BRCRNN64C54G084E',
            'dob'                => '1990-11-30',
            'phone_number'       => '0510848571',
            'gender'             => 'F',
            'street_address'     => 'Via Barbarigo',
            'street_number'      => '14',
            'postal_code'        => '44100',
            'city'               => 'Ferrara',
            'id_doctor'          => '2',
            'id_user'            => '15',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BRSDNA44C25H047K',
            'dob'                => '1938-11-14',
            'phone_number'       => '0510848583',
            'gender'             => 'M',
            'street_address'     => 'Via Val di Fassa',
            'street_number'      => '226',
            'postal_code'        => '44100',
            'city'               => 'Ferrara',
            'id_doctor'          => '2',
            'id_user'            => '16',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BRTLNE98E67H468M',
            
            'dob'                => '1930-07-26',
            'phone_number'       => '0510958493',
            'gender'             => 'F',
            'street_address'     => 'Via G.Ragusa',
            'street_number'      => '47/b',
            'postal_code'        => '44100',
            'city'               => 'Ferrara',
            'id_doctor'          => '5',
            'id_user'            => '17',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ], [
            'fiscal_code'        => 'BSCDLE74L41F419V',
            'dob'                => '2005-07-15',
            'phone_number'       => '0510656032',
            'gender'             => 'F',
            'street_address'     => 'Via Derna',
            'street_number'      => '225',
            'postal_code'        => '44100',
            'city'               => 'Ferrara',
            'id_doctor'          => '5',
            'id_user'            => '18',
            'updated_at'         => date('Y-m-d h:s:i'),
            'created_at'         => date('Y-m-d h:s:i')
        ]]);
    }
}