<?php

namespace App\Domains\Application\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Noticia extends Model implements Transformable
{
    use Sluggable,TransformableTrait;

    protected $fillable = [
        'titulo','destaque','conteudo','img_destaque','autor','fonte','publicado','categoria_id'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    public function getTituloAttribute($value)
    {
        return ucfirst(title_ucwords($value));
    }

    public function categoria()
    {
        return $this->belongsTo(NoticiaCategoria::class,'categoria_id','id');
    }

}
