<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name'        => 'Giuseppe',
            'surname'     => 'Giacalone',
            'role'        => '1',
            'email'       => 'giuseppeadmin@gmail.com',
            'password'    => bcrypt('admin'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Rosaria',
            'surname'     => 'Ciociola',
            'role'        => '1',
            'email'       => 'rosariaadmin@gmail.com',
            'password'    => bcrypt('admin'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Giulio',
            'surname'     => 'Milani',
            'role'        => '1',
            'email'       => 'giulioadmin@gmail.com',
            'password'    => bcrypt('admin'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Elide',
            'surname'     => 'China',
            'role'        => '2',
            'email'       => 'elid.chin@tin.it',
            'password'    => bcrypt('dottore'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Ludovica',
            'surname'     => 'Chiellini',
            'role'        => '2',
            'email'       => 'ludovica.chiellini@gmail.com',
            'password'    => bcrypt('dottore'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Iside',
            'surname'     => 'Claveri',
            'role'        => '2',
            'email'       => 'iside.claveri@aruba.it',
            'password'    => bcrypt('dottore'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Torquato',
            'surname'     => 'Persichetti',
            'role'        => '2',
            'email'       => 'torquato.persichetti@yahoo.com',
            'password'    => bcrypt('dottore'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Costantino',
            'surname'     => 'Boncio',
            'role'        => '2',
            'email'       => 'costantino.boncio@aruba.it',
            'password'    => bcrypt('dottore'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Dora',
            'surname'     => 'Bagi',
            'role'        => '3',
            'email'       => 'dora.bagi@gmail.com',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Maddalena',
            'surname'     => 'Bignotto',
            'role'        => '3',
            'email'       => 'm.bignotto@gmail.it',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Valter',
            'surname'     => 'Bellaforte',
            'role'        => '3',
            'email'       => 'v.bellafronte@gmail.com',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Tiziana',
            'surname'     => 'Belardi',
            'role'        => '3',
            'email'       => 'tiziana.belardi@gmail.com',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Alessia',
            'surname'     => 'Bonforte',
            'role'        => '3',
            'email'       => 'alessia.bonforte@gmail.com',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Tibaldo',
            'surname'     => 'Bonsignore',
            'role'        => '3',
            'email'       => 'tibaldo.bonsignore@libero.it',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Arianna',
            'surname'     => 'Bracone',
            'role'        => '3',
            'email'       => 'arianna.bracone@aruba.it',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Adone',
            'surname'     => 'Borsari',
            'role'        => '3',
            'email'       => 'adone.borsari@aruba.it',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Eliana',
            'surname'     => 'Bertagnini',
            'role'        => '3',
            'email'       => 'eliana.bertagnini@yahoo.com',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ], [
            'name'        => 'Delia',
            'surname'     => 'Beschi',
            'role'        => '3',
            'email'       => 'dbeschi@teletu.it',
            'password'    => bcrypt('paziente'),
            'updated_at'  => date('Y-m-d h:s:i'),
            'created_at'  => date('Y-m-d h:s:i')
        ]]);
    }
}