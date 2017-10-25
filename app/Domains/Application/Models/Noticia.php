<?php

namespace App\Domains\Application\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Noticia extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo','destaque','conteudo','img_destaque','autor','fonte','publicado'
    ];

    public function getTituloAttribute($value)
    {
        return ucfirst(title_ucwords($value));
    }

}
