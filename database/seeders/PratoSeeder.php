<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prato;
use App\Models\User;

class PratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Prato::create([
            'nm_prato' => 'Lasanha de carne',
            'desc_ingred' => 'Massa de lasanha, carne moída, queijo e molho de tomate',
            'vl_prato' => 20.00,
            'arquivo' => 'pratos/lasanha.jpg',
            'user_id' => $user->id
        ]);

        Prato::create([
            'nm_prato' => 'Pizza de Calabresa',
            'desc_ingred' => 'Massa, molho de tomate, calabresa e mussarela',
            'vl_prato' => 30.00,
            'arquivo' => 'pratos/PizzaCalabresa.jpg',
            'user_id' => $user->id
        ]);

        Prato::create([
            'nm_prato' => 'Salada Caesar',
            'desc_ingred' => 'Alface, ovos, queijo parmesão, croutons e molho Caesar',
            'vl_prato' => 18.00,
            'arquivo' => 'pratos/SaladaCaesar.jpg',
            'user_id' => $user->id
        ]);
    }
}

