<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\CategoryEnum;
use App\Models\ScaleModel;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Vw. Type 166 "Schwimmwagen"',
                'scale' => '1:35',
                'author_id' => 1,
                'nominations' => ['afv','germany','wwii']
            ],
            [
                'id' => 2,
                'name' => 'SEPECAT Jaguar A',
                'scale' => '1:72',
                'author_id' => 2,
                'nominations' => ['aviation','france','cold_war']
            ],
            [
                'id' => 3,
                'name' => 'le. gl. Einheits-PKW Kfz.4 "Stoewer"',
                'scale' => '1:35',
                'author_id' => 1,
                'nominations' => ['afv','germany','wwii']
            ],
            [
                'id' => 4,
                'name' => 'Як-52',
                'scale' => '1:48',
                'author_id' => 3,
                'nominations' => ['aviation','ukraine','modern']
            ],
            [
                'id' => 5,
                'name' => 'Chevrolet G7107',
                'scale' => '1:35',
                'author_id' => 1,
                'nominations' => ['afv','usa','wwii']
            ],
            [
                'id' => 6,
                'name' => 'Курська битва',
                'scale' => '1:35',
                'author_id' => 4,
                'nominations' => ['diorama','wwii']
            ],
            [
                'id' => 7,
                'name' => 'Годжо Сатору',
                'scale' => '1:16',
                'author_id' => 5,
                'nominations' => ['fiction','diorama']
            ],
            [
                'id' => 8,
                'name' => 'Yamato',
                'scale' => '1:700',
                'author_id' => 6,
                'nominations' => ['fleet','japan','wwii']
            ],
            [
                'id' => 9,
                'name' => 'Т-54Б',
                'scale' => '1:35',
                'author_id' => 7,
                'nominations' => ['afv','ussr','cold_war']
            ],
            [
                'id' => 10,
                'name' => 'МіГ-21біс',
                'scale' => '1:72',
                'author_id' => 2,
                'nominations' => ['aviation','ussr','cold_war']
            ],
        ];

        foreach ($data as $item) {
            $nominations = $item['nominations'];
            unset($item['nominations']);
            $model = ScaleModel::updateOrCreate(
                ['name' => $item['name'], 'scale' => $item['scale']],
                $item
            );
            $model->nominations()->sync($nominations);
        }
    }
}
