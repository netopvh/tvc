<?php

namespace App\Domains\Application\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Parceiro extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome','tp_pessoa','cpf_cnpj','email','telefone','responsavel'
    ];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_strtoupper($value,"UTF-8");
    }

    public function setResponsavelAttribute($value)
    {
        $this->attributes['responsavel'] = mb_strtoupper($value,"UTF-8");
    }

}
