<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\CategoryEnum;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('models')->insert([
            [
                'id' => 1,
                'name' => 'Vw. Type 166 "Schwimmwagen"',
                'scale' => '1:35',
                'categories' => json_encode([
                    CategoryEnum::AFV->value,
                    CategoryEnum::GERMANY->value,
                    CategoryEnum::WWII->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'SEPECAT Jaguar A',
                'scale' => '1:72',
                'categories' => json_encode([
                    CategoryEnum::AVIATION->value,
                    CategoryEnum::FRANCE->value,
                    CategoryEnum::COLD_WAR->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'le. gl. Einheits-PKW Kfz.4 "Stoewer"',
                'scale' => '1:35',
                'categories' => json_encode([
                    CategoryEnum::AFV->value,
                    CategoryEnum::GERMANY->value,
                    CategoryEnum::WWII->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Як-52',
                'scale' => '1:48',
                'categories' => json_encode([
                    CategoryEnum::AVIATION->value,
                    CategoryEnum::UKRAINE->value,
                    CategoryEnum::MODERN->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 3,
            ],
            [
                'id' => 5,
                'name' => 'Chevrolet G7107',
                'scale' => '1:35',
                'categories' => json_encode([
                    CategoryEnum::AFV->value,
                    CategoryEnum::USA->value,
                    CategoryEnum::WWII->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Курська битва',
                'scale' => '1:35',
                'categories' => json_encode([
                    CategoryEnum::DIORAMA->value,
                    CategoryEnum::AFV->value,
                    CategoryEnum::UKRAINE->value,
                    CategoryEnum::MODERN->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 4,
            ],
            [
                'id' => 7,
                'name' => 'Годжо Сатору',
                'scale' => '1:16',
                'categories' => json_encode([
                    CategoryEnum::DIORAMA->value,
                    CategoryEnum::FICTION->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 5,
            ],
            [
                'id' => 8,
                'name' => 'Yamato',
                'scale' => '1:700',
                'categories' => json_encode([
                    CategoryEnum::FLEET->value,
                    CategoryEnum::JAPAN->value,
                    CategoryEnum::WWII->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 6,
            ],
            [
                'id' => 9,
                'name' => 'Т-54Б',
                'scale' => '1:35',
                'categories' => json_encode([
                    CategoryEnum::AFV->value,
                    CategoryEnum::USSR->value,
                    CategoryEnum::COLD_WAR->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 7,
            ],
            [
                'id' => 10,
                'name' => 'МіГ-21біс',
                'scale' => '1:72',
                'categories' => json_encode([
                    CategoryEnum::AVIATION->value,
                    CategoryEnum::USSR->value,
                    CategoryEnum::COLD_WAR->value,
                ],JSON_UNESCAPED_UNICODE),
                'author_id' => 2,
            ],
        ]);
    }
}
