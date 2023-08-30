<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::firstOrCreate(['name' => 'Pendiente']);
        State::firstOrCreate(['name' => 'Realizada']);
        State::firstOrCreate(['name' => 'Cancelada']);
    }
}
