<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Sliderseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliderhomes')->insert([
            'name' => 'Thom',
            'desc1' => 'COMO',
            'desc2' => 'COMO2',
            'desc3' => 'COMO3',
            'desc4' => 'COMO4',
        ]);
    }
}
