<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 07/10/2017
 * Time: 12:42
 */

namespace App\Core\Repositories;

use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository as PrettusRepository;

class BaseRepository extends PrettusRepository
{

    /**
     * BaseRepository constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model()
    {
        return $this->model;
    }

    public function findWithoutFail($id, $columns = ['*'])
    {
        try {
            return $this->find($id, $columns);
        } catch (\Exception $e) {
            return;
        }
    }

    public function query()
    {
        return $this->model->newQuery();
    }

    public function select(array $colunms = ['*'])
    {
        return $this->model->newQuery()->select($colunms);
    }

}