<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            Author::updateOrCreate(
                ['name' => "Автор{$i}"],
                [
                    'email' => "email{$i}@gmail.com",
                    'phone' => "+38012345678{$i}.",
                ]
            );
        }
    }
}
