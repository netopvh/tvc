<?php

namespace App\Domains\Application\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NoticiaCategoria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['descricao'];

    public function setDescricaoAttribute($value)
    {
        $this->attributes['descricao'] = mb_strtoupper($value, "UTF-8");
    }

}
