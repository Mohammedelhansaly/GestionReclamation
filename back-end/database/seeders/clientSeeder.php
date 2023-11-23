<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'nom' => 'elhansaly',
            'prenom' => 'mohammed',
            'CIN' => 'EA236509',
            'csc' => '(Cercle)CERLE REHAMNA/(Caidat) BOUCHANE',
            'probleme_id' => '1'
        ]);
    }
}
