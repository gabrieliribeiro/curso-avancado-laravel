<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteContato::factory()
            ->count(100) // Define quantos registros serão criados
            ->create(); // Cria os registros no banco de dados
        



        //Exemplo para criar contatos
        /* $contato = new SiteContatoModel();
        $contato->name = 'Contato 1';
        $contato->telefone = '(11) 99999-9999';
        $contato->email = 'contato1@email.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Mensagem de teste para o contato 1.';
        $contato->save(); */

    }
}
