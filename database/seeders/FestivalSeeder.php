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
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2021-12-28',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2021-12-29',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2021-12-30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2021-12-31',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2022-12-28',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2022-12-29',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2022-12-30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2022-12-31',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-28',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-29',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);        
        DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-31',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]); 
                DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-31',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]); 
                DB::table('festivals')->insert([
                'name' => 'COUNTDOWN JAPAN',
                'date' => '2023-12-31',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]); 
    }
}
