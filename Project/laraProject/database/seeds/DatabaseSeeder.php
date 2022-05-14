<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('DatiPersonali')->insert([
            ['IDDatiPersonali' => 1, 'IDFotoProfilo' => 1, 'Cellulare' => 3256425968, 'Via' => 'Via brecce bianche', 'Citta' => 'Ancona', 'NumCivico' => 4, 'CAP' => 60123, 'Nome' => 'Paolo', 'Cognome' => 'Beci', 'DataNascita' => '22/07/2000', 'LuogoNascita' => 'Fabriano', 'Mail' => 'paolo.beci@gmail.com', 'CodiceFiscale' => 'BCEPLA00L22D451H'],
            ['IDDatiPersonali' => 2, 'IDFotoProfilo' => 2, 'Cellulare' => NULL, 'Via' => 'Via brecce bianche', 'Citta' => 'Ancona', 'NumCivico' => 25, 'CAP' => 60123, 'Nome' => 'Giuseppe', 'Cognome' => 'Izzi', 'DataNascita' => '23/06/2000', 'LuogoNascita' => 'Vasto', 'Mail' => 'izzi.g@gmail.com', 'CodiceFiscale' => 'SCCPRM10D08H501W'],
            ['IDDatiPersonali' => 3, 'IDFotoProfilo' => NULL, 'Cellulare' => 4568235971, 'Via' => 'Via brecce bianche', 'Citta' => 'Ancona', 'NumCivico' => 23, 'CAP' => 60123, 'Nome' => 'Domenico', 'Cognome' => 'La Porta', 'DataNascita' => '10/05/2000', 'LuogoNascita' => 'San Marco in Lamis', 'Mail' => 'd.laporta@gmail.com', 'CodiceFiscale' => 'SCCPRM08S24H501C'],
            ['IDDatiPersonali' => 4, 'IDFotoProfilo' => 3, 'Cellulare' => 3225874691, 'Via' => 'Via brecce bianche', 'Citta' => 'Ancona', 'NumCivico' => 45, 'CAP' => 60123, 'Nome' => 'Emanuele', 'Cognome' => 'Frisi', 'DataNascita' => '03/11/2000', 'LuogoNascita' => 'Foggia', 'Mail' => NULL, 'CodiceFiscale' => 'FRSMNL00E11D643V'],
        ]);
    }
}
