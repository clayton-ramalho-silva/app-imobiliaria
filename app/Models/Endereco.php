<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'complemento'
    ];


    //definindo o inverso do relacionamento como o model imovel

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);

        //convecao para identificar a chave estrangeira:
            // pega o nome do metodo 'imovel' e acrescentar o sufixo '_id': 'imovel_id'
            // caso nao siga convenção - acrescentar a chava estrangeira como argumebnto ->belongsTo(Imovel::class,'chave_estrangeira')
            // se a chave estrangeira nao estiver liga a chave primaria: ->belongsTo(Imovel::class,'chave_estrangeira', 'campo_associado')
    }
}
