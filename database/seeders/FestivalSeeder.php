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
            $events = [
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2021-12-28'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2021-12-29'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2021-12-30'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2021-12-31'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2022-12-28'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2022-12-29'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2022-12-30'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2022-12-31'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2023-12-28'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2023-12-29'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2023-12-30'],
                ['name' => 'COUNTDOWN JAPAN', 'date' => '2023-12-31'],
                ['name' => 'JAPAN JAM', 'date' => '2021-05-02'],
                ['name' => 'JAPAN JAM', 'date' => '2021-05-03'],
                ['name' => 'JAPAN JAM', 'date' => '2021-05-04'],
                ['name' => 'JAPAN JAM', 'date' => '2021-05-05'],
                ['name' => 'JAPAN JAM', 'date' => '2022-05-01'],
                ['name' => 'JAPAN JAM', 'date' => '2022-05-03'],
                ['name' => 'JAPAN JAM', 'date' => '2022-05-04'],
                ['name' => 'JAPAN JAM', 'date' => '2022-05-05'],
                ['name' => 'JAPAN JAM', 'date' => '2022-05-07'],
                ['name' => 'JAPAN JAM', 'date' => '2023-04-30'],
                ['name' => 'JAPAN JAM', 'date' => '2023-05-03'],
                ['name' => 'JAPAN JAM', 'date' => '2023-05-04'],
                ['name' => 'JAPAN JAM', 'date' => '2023-05-05'],
                ['name' => 'JAPAN JAM', 'date' => '2023-05-06'],
                ['name' => 'JAPAN JAM', 'date' => '2024-04-28'],
                ['name' => 'JAPAN JAM', 'date' => '2024-04-29'],
                ['name' => 'JAPAN JAM', 'date' => '2024-05-03'],
                ['name' => 'JAPAN JAM', 'date' => '2024-05-04'],
                ['name' => 'JAPAN JAM', 'date' => '2024-05-05'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2022-08-06'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2022-08-07'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2022-08-11'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2022-08-12'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2023-08-05'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2023-08-06'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2023-08-11'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2023-08-12'],
                ['name' => 'ROCK IN JAPAN FESTIVAL', 'date' => '2023-08-13'],
            ];
        
            foreach ($events as $event) {
                DB::table('festivals')->insert([
                    'name' => $event['name'],
                    'date' => $event['date'],
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]);
            }
        }
}
