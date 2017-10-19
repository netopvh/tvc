<?php

namespace App\Domains\Application\Repositories;

use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Application\Repositories\Contracts\ParceiroRepository;
use App\Domains\Application\Models\Parceiro;
use App\Domains\Application\Validators\ParceiroValidator;

/**
 * Class ParceiroRepositoryEloquent
 * @package namespace App\Domains\Application\Repositories;
 */
class ParceiroRepositoryEloquent extends BaseRepository implements ParceiroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Parceiro::class;
    }

    public function validator()
    {
        return ParceiroValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
