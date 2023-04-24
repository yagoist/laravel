<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data= [];
        for($i = 0; $i < 10; $i++){
            $data[] = [
                'title' => \fake()->jobTitle(),
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
