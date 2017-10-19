<?php

namespace App\Domains\Application\Repositories;

use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use App\Domains\Application\Models\Noticia;
use App\Domains\Application\Validators\NoticiaValidator;

/**
 * Class NoticiaRepositoryEloquent
 * @package namespace App\Domains\Application\Repositories;
 */
class NoticiaRepositoryEloquent extends BaseRepository implements NoticiaRepository
{

    protected $fieldSearchable = [
        'title'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Noticia::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return NoticiaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
