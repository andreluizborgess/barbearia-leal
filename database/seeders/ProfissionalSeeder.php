<?php

namespace Database\Seeders;

use App\Models\Profissionai;
use App\Models\Profissional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfissinalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 10; $i++){
            Profissionai::create([
                
                'nome' => "teste ".$i,
                'cpf' => rand(00000000001, 99999999999),
                'celular' => "18".rand(990000001,999999999),
                'email' => "teste".$i."@gmail.com",
                "dataNacimento"=>rand(1,31)."/". rand(1,12)."/". rand(1900,2023),
                "cidade"=>"presidente epitacio",
                "estado"=>"SP",
                "pais"=>"Brasil",
                "rua"=>"RUA mario costa",
                "numero"=>"150",
                "bairro"=>"village lagoinha",
                "cep"=>"19470000",
                "complemeto"=>"casa de esquina",
                "salario"=>rand(1200.00 , 50000.00),
                'password' => Hash::make("123456")
    
            ]);
    }
    }
}