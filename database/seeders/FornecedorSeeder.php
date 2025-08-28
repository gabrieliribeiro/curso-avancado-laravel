<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FornecedorModel;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instaciando objeto e salvando
        $fornecedor = new FornecedorModel();
        $fornecedor->name = 'Fornecedor 1';
        $fornecedor->site = 'www.fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor1@email.com';
        $fornecedor->save();

        //método create (atenção para o fillable no model)
        FornecedorModel::create([
            'name' => 'Fornecedor 2',
            'site' => 'www.fornecedor2.com.br',
            'uf' => 'RJ',
            'email' => 'fornecedor2']
        );

        //insert direto no banco
        DB::table('fornecedores')->insert([
            'name' => 'Fornecedor 3',
            'site' => 'www.fornecedor3.com.br',
            'uf' => 'MG',
            'email' => 'fornecedor3@email.com'
        ]);
    }
}
