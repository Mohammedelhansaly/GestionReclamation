<?php

namespace Database\Seeders;

use App\Models\Reclamation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class reclamationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reclamation::create([
            'titre'=>'amo',
            'status'=>'resolu',
            'client_id'=>'1'
        ]);
    }
}