<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prato;

class PratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pratos = [[
            'nm_prato' => 'Lasanha de carne',
            'desc_ingred' => 'Massa de lasanha, carne moída, queijo e molho de tomate',
            'vl_prato' => 20.00,
            'arquivo' => '/pratos/Lasanha.jpg'
        ],
            [   
            'nm_prato' => 'Pizza de Calabresa',
            'desc_ingred' => 'Massa fina, molho de tomate, queijo mussarela e calabresa fatiada',
            'vl_prato' => 35.00,
            'arquivo' => '/pratos/PizzaCalabresa.jpg'
        ],
            [
            'nm_prato' => 'Salada Caesar',
            'desc_ingred' => 'Alface romana, tomate, ovo, croutons e molho caesar',
            'vl_prato' => 18.50,
            'arquivo' => '/pratos/SaladaCaesar.jpg'
        ]];

        foreach ($pratos as $prato) {
            Prato::create($prato);
        }
    }
}

