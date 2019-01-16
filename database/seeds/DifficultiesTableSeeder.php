<?php

use Illuminate\Database\Seeder;
use App\Models\Difficulty;

class DifficultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $difficulties = [
            [
                'id' => 1,
                'name' => 'Beginner',
                'display_order' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Intermediate',
                'display_order' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Expert',
                'display_order' => 3,
            ],
        ];
        foreach ($difficulties as $difficulty) {
            Difficulty::create($difficulty);
        }
    }
}
