<?php

namespace App\Domains\Application\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Site extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
