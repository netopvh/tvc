<?php

namespace App\Domains\Application\Repositories;

use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Application\Repositories\Contracts\SiteRepository;
use App\Domains\Application\Models\Site;
use App\Domains\Application\Validators\SiteValidator;

/**
 * Class SiteRepositoryEloquent
 * @package namespace App\Domains\Application\Repositories;
 */
class SiteRepositoryEloquent extends BaseRepository implements SiteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Site::class;
    }

    public function validator()
    {
        return SiteValidator::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
