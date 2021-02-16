<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'admin',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name' => 'doctor',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name' => 'patient',
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ]]);
    }
}
