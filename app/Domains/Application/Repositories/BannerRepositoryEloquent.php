<?php

namespace App\Domains\Application\Repositories;

use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Application\Repositories\Contracts\BannerRepository;
use App\Domains\Application\Models\Banner;
use App\Domains\Application\Validators\BannerValidator;

/**
 * Class BannerRepositoryEloquent
 * @package namespace App\Domains\Application\Repositories;
 */
class BannerRepositoryEloquent extends BaseRepository implements BannerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
