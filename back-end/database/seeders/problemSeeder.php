<?php

namespace Database\Seeders;

use App\Models\Probleme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class problemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Probleme::create([
            'description'=>'probleme1'
        ]);
    }
}