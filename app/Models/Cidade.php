<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    /* A conveção laravel pede que o nome da Model seja Singular Plural, ingles e PacalCase: City, User, etc.
    e o nome da tabela seja versão sneak_case e plural do Model: citys, users, etc
    Caso estaja usando outra conveção ou apareça algum problema de compatibilidade é necessario no model
    expliciar o nome da tabela conforme o exemplo abaixo

    protected $table = 'tabela_cidades';

    Tambem é possivel criar o model junto com o nome da tabela:

    php artisan make:model NotaFiscal -m
    //Model created successfully
    //Created Migration: 2022_04_11_192821_create_nota_fiscals_table
    */

    /* Convenção de chave primária
    Larevel espera que a chave primaria do modelo se chame id, caso contrario possivel informar no model o nome da chave

    protected $primarykey = 'chave_primaria';

    */
}
