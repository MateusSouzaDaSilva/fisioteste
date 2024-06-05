<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno; // Certifique-se de que este caminho esteja correto

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Aluno 1
        Aluno::create([
            'alu_nome' => 'João',
            'alu_sobrenome' => 'Silva',
            'alu_cpf' => '111.111.111-11',
            'alu_end' => 'Rua A, 123',
            'alu_bairro' => 'Centro',
            'alu_cidade' => 'São Paulo',
            'alu_fone' => '11 1111-1111',
            'alu_celular' => '11 91111-1111',
            'alu_sexo' => 'M',
            'alu_dtnasc' => '1990-01-01',
            'alu_dtvencimento' => '2024-12-01',
        ]);

        // Aluno 2
        Aluno::create([
            'alu_nome' => 'Maria',
            'alu_sobrenome' => 'Oliveira',
            'alu_cpf' => '222.222.222-22',
            'alu_end' => 'Rua B, 456',
            'alu_bairro' => 'Bela Vista',
            'alu_cidade' => 'Rio de Janeiro',
            'alu_fone' => '21 2222-2222',
            'alu_celular' => '21 92222-2222',
            'alu_sexo' => 'F',
            'alu_dtnasc' => '1992-02-02',
            'alu_dtvencimento' => '2024-11-01',
        ]);

        // Aluno 3
        Aluno::create([
            'alu_nome' => 'Carlos',
            'alu_sobrenome' => 'Pereira',
            'alu_cpf' => '333.333.333-33',
            'alu_end' => 'Rua C, 789',
            'alu_bairro' => 'Jardins',
            'alu_cidade' => 'Belo Horizonte',
            'alu_fone' => '31 3333-3333',
            'alu_celular' => '31 93333-3333',
            'alu_sexo' => 'M',
            'alu_dtnasc' => '1985-03-03',
            'alu_dtvencimento' => '2024-10-01',
        ]);

        // Aluno 4
        Aluno::create([
            'alu_nome' => 'Ana',
            'alu_sobrenome' => 'Costa',
            'alu_cpf' => '444.444.444-44',
            'alu_end' => 'Rua D, 321',
            'alu_bairro' => 'Copacabana',
            'alu_cidade' => 'Rio de Janeiro',
            'alu_fone' => '21 4444-4444',
            'alu_celular' => '21 94444-4444',
            'alu_sexo' => 'F',
            'alu_dtnasc' => '1987-04-04',
            'alu_dtvencimento' => '2024-09-01',
        ]);

        // Aluno 5
        Aluno::create([
            'alu_nome' => 'Pedro',
            'alu_sobrenome' => 'Gomes',
            'alu_cpf' => '555.555.555-55',
            'alu_end' => 'Rua E, 654',
            'alu_bairro' => 'Lapa',
            'alu_cidade' => 'São Paulo',
            'alu_fone' => '11 5555-5555',
            'alu_celular' => '11 95555-5555',
            'alu_sexo' => 'M',
            'alu_dtnasc' => '1995-05-05',
            'alu_dtvencimento' => '2024-08-01',
        ]);

        // Aluno 6
        Aluno::create([
            'alu_nome' => 'Fernanda',
            'alu_sobrenome' => 'Ribeiro',
            'alu_cpf' => '666.666.666-66',
            'alu_end' => 'Rua F, 987',
            'alu_bairro' => 'Ipanema',
            'alu_cidade' => 'Rio de Janeiro',
            'alu_fone' => '21 6666-6666',
            'alu_celular' => '21 96666-6666',
            'alu_sexo' => 'F',
            'alu_dtnasc' => '1996-06-06',
            'alu_dtvencimento' => '2024-07-01',
        ]);

        // Aluno 7
        Aluno::create([
            'alu_nome' => 'Lucas',
            'alu_sobrenome' => 'Almeida',
            'alu_cpf' => '777.777.777-77',
            'alu_end' => 'Rua G, 654',
            'alu_bairro' => 'Leblon',
            'alu_cidade' => 'São Paulo',
            'alu_fone' => '11 7777-7777',
            'alu_celular' => '11 97777-7777',
            'alu_sexo' => 'M',
            'alu_dtnasc' => '1993-07-07',
            'alu_dtvencimento' => '2024-06-01',
        ]);
    }
}
