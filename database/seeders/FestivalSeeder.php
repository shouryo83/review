<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('festivals')->insert([
                'name' => 'JAPAN JAM',
                'date' => '2020-05-04',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
