<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    }

    public function run(): void
    {
       DB::table('users')->insert([
         'name' => 'Willian Sanini',
         'email' => 'willian.sanini@teste.com',
         'password' => bcrypt('12345678'),
       ]); }}
