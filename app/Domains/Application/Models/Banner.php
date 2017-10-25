<?php

namespace App\Domains\Application\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

class Banner extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['parceiro_id','data_limite','clicks','imagem','posicao','publicado'];

    public function parceiro()
    {
        return $this->belongsTo(Parceiro::class);
    }

    public function setDataLimiteAttribute($value)
    {
        if(!is_null($value)){
            $this->attributes['data_limite'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
        }
    }

    public function getDataLimiteAttribute($value)
    {
        if(!is_null($value)){
            return Carbon::createFromFormat('Y-m-d',$value)->format('d/m/Y');
        }
    }

}
