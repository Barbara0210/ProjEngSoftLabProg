<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anuncio;
use App\Models\User;


class AnuncioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {
        {
            $anuncios = [
                [
                    'titulo'          => 'Vendo telemovel',
                    'preco'           => '100',
                    'estado'   => 'usado',
                    'descricao'   => 'estou a vender telemovel',
                    'user_id'=>'1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
             

                ],
                [
                    'titulo'          => 'Vendo pc',
                    'preco'           => '200',
                    'estado'   => 'usado',
                    'descricao'   => 'estou a vender pc',
                    'user_id'=>'1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'titulo'          => 'Vendo televisao',
                    'preco'           => '1000',
                    'estado'   => 'usado',
                    'descricao'   => 'estou a vender televisao',
                    'user_id'=>'1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'titulo'          => 'Vendo roupa',
                    'preco'           => '10',
                    'estado'   => 'usado',
                    'descricao'   => 'estou a vender roupa',
                    'user_id'=>'1',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            ];
    
            Anuncio::insert($anuncios);
    }
}
}