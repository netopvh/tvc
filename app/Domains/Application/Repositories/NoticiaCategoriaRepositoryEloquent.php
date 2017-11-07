<?php

namespace App\Domains\Application\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Application\Repositories\Contracts\NoticiaCategoriaRepository;
use App\Domains\Application\Models\NoticiaCategoria;
use App\Domains\Application\Validators\NoticiaCategoriaValidator;

/**
 * Class NoticiaCategoriaRepositoryEloquent
 * @package namespace App\Domains\Application\Repositories;
 */
class NoticiaCategoriaRepositoryEloquent extends BaseRepository implements NoticiaCategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NoticiaCategoria::class;
    }

    public function validator()
    {
        return NoticiaCategoriaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
