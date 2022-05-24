<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {

        DB::table('utente')->insert([
            ['username' => 'alexalex',
                'password' => Hash::make('alexalex'), 'ruolo' => 'locatore'],
            ['username' => 'izziizzi',
                'password' => Hash::make('izziizzi'), 'ruolo' => 'locatario'],
            ['username' => 'adminadmin',
                'password' => Hash::make('adminadmin'), 'ruolo' => 'admin']
        ]);
    }

}
