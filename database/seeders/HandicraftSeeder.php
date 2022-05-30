<?php

namespace Database\Seeders;

use App\Models\Handicraft;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class HandicraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Handicraft::create([
            'scrap_category_id' => 1,
            'title' => "Lampu Hias dari Botol Bekas",
            'image' => "",
            'desc' => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.",
            'materials' => "Botol bekas, Cutter atau gunting, Baterai, Kawat, Set lampu LED, Tang, Kardus Lem",
            'process' => '',
        ]);
    }
}
