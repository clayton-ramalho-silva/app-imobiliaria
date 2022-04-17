<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;
    //definimos manualmente a tabla imoveis por se tratar de diferença no plural
    protected $table = "imoveis";

    // Defeninto os relacionamentos entre as tabelas

    //Relacionando tabela imoveis para enderecos 1:1
    public function endereco()
    {
        return $this->hasOne(Enderero::class);
        //return $this->hasOne(Enderero::class, 'chave_estrangeira'); -> caso a chave estrangeira nao seguir o padrao basta colocar o nome do campo como segundo argumento
        //como o elquente entende a forengId: pera o nome da classe e coloca em minusculo e acressenta o sufixo '_id'//imovel_id
        // 99% das chaves estrangeiras são apontadas para a chave primaria do outro model
        //se for necesssar apontar para outro campo basta acrescentar o 3 argumento ...hasOne(Enderero::class, 'chave_estrangeira','campo_associado')
    }

    //Relacionando tabela imoveis com cidade n:1

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    //Relacionando tabela imoveis com finalidade n:1
    public function finalidade()
    {
        return $this->belongsTo(Finalidade::class);
    }

     //Relacionando tabela imoveis com tipo n:1
     public function tipo()
     {
         return $this->belongsTo(Tipo::class);
     }

     public function proximidades()
     {
        return $this->belongsToMany(Proximidade::class)->withTimestamps();

        //convenção da nome tabela intermediaria
        //pega o nome dos dois modelos em snake_case singular em ordem alfabetica: imovel_proximidade

        //caso nome da chave estrangeira da tabela pivot com relação a esse modelo: imovel_id

     }
}
