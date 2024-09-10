<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Person::factory()->createOne([
            'nome' => 'adm',
            'cnpj' => 'aaaa',
            'email' => 'adm@gmail.com',
            'cpf' => '123.123.123.12',
            'tipo_endereco' => 'Endereço',
            'endereco' => 'UNIFAE - São João da Boa Vista',
            'tipo_pessoa' => 'adm',
            'tipo_perfil' => 'adm',
            'senha' => '1234',
            'permission' => 1
        ]);

    }
}
