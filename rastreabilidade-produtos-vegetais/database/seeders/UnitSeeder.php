<?php

namespace Database\Seeders;

use App\Model\Unit;
use App\Models\Unit as ModelsUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'title' => 'kg',
                'description' => 'Quilograma',
                'status' => '1'
            ],
            [
                'title' => 'hg',
                'description' => 'Hectograma',
                'status' => '1'
            ],
            [
                'title' => 'g',
                'description' => 'Grama',
                'status' => '1'
            ],
            [
                'title' => 'dg',
                'description' => 'Decigrama',
                'status' => '1'
            ],
            [
                'title' => 'cg',
                'description' => 'Centigrama',
                'status' => '1'
            ],
            [
                'title' => 'mg',
                'description' => 'Miligrama',
                'status' => '1'
            ]

        ];

        foreach ($data as $item) {
            ModelsUnit::create($item);
        }

    }
}
