<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch');
    }
    public function movement(){
        return $this->belongsTo('App\Models\Movement');
    }

    protected $fillable = [
        'nome', 'email', 'razao_social', 'cpf', 'cnpj', 'cgc', 'nome_fantasia', 'tipo_endereco', 'endereco', 'telefone', 'website', 'tipo_pessoa', 'tipo_perfil', 'imagem_perfil', 'mapa', 'imagem_aerea', 'imagem_fundo'
    ];
}
