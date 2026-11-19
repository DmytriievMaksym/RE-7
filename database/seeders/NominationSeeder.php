<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\CategoryEnum;
use App\Models\Nomination;
use App\Models\NominationTranslation;

class NominationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $englishTranslations = [
            CategoryEnum::AFV->name => [
                'name' => 'Armored Vehicles (AFV)',
                'description' => 'AFVs and other ground vehicles',
            ],
            CategoryEnum::AVIATION->name => [
                'name' => 'Aviation',
                'description' => 'Aircrafts and other aerial vehicles',
            ],
            CategoryEnum::FLEET->name => [
                'name' => 'Fleet',
                'description' => 'Naval vessels, warships, submarines',
            ],
            CategoryEnum::DIORAMA->name => [
                'name' => 'Dioramas',
                'description' => 'Dioramas and vignettes',
            ],
            CategoryEnum::UKRAINE->name => [
                'name' => 'Ukraine',
                'description' => 'Ukrainian vehicles and aircraft',
            ],
            CategoryEnum::USA->name => [
                'name' => 'USA',
                'description' => 'United States vehicles and aircraft',
            ],
            CategoryEnum::GERMANY->name => [
                'name' => 'Germany',
                'description' => 'German vehicles and aircraft',
            ],
            CategoryEnum::USSR->name => [
                'name' => 'USSR',
                'description' => 'Soviet Union vehicles and aircraft',
            ],
            CategoryEnum::GREAT_BRITAIN->name => [
                'name' => 'Great Britain',
                'description' => 'British vehicles and aircraft',
            ],
            CategoryEnum::FRANCE->name => [
                'name' => 'France',
                'description' => 'French vehicles and aircraft',
            ],
            CategoryEnum::JAPAN->name => [
                'name' => 'Japan',
                'description' => 'Japanese vehicles and aircraft',
            ],
            CategoryEnum::WWI->name => [
                'name' => 'WWI',
                'description' => 'First World War',
            ],
            CategoryEnum::MIDWAR->name => [
                'name' => 'Interwar',
                'description' => 'Interwar period',
            ],
            CategoryEnum::WWII->name => [
                'name' => 'WWII',
                'description' => 'Second World War',
            ],
            CategoryEnum::COLD_WAR->name => [
                'name' => 'Cold War',
                'description' => 'Cold War',
            ],
            CategoryEnum::MODERN->name => [
                'name' => 'Modern',
                'description' => 'Modern era',
            ],
            CategoryEnum::FICTION->name => [
                'name' => 'Fantasy & Sci-Fi',
                'description' => 'Fantasy and science fiction',
            ],
        ];

        $translationRows = [];

        foreach (CategoryEnum::cases() as $case) {
            $key = strtolower($case->name);
            Nomination::firstOrCreate(['key' => $key]);

            $translationRows[] = [
                'nomination' => $key,
                'locale'         => 'uk',
                'name'           => $case->value,
                'description'    => $case->label(),
            ];

            $en = $englishTranslations[$case->name];
            $translationRows[] = [
                'nomination' => $key,
                'locale'         => 'en',
                'name'           => $en['name'],
                'description'    => $en['description'],
            ];
        }

        NominationTranslation::upsert(
            $translationRows,
            ['nomination', 'locale'],
            ['name', 'description']
        );
    }
}
