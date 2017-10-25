<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 07/10/2017
 * Time: 12:42
 */

namespace App\Core\Repositories;

use App\Exceptions\Access\GeneralException;
use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository as PrettusRepository;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Validator\Contracts\ValidatorInterface;


class BaseRepository extends PrettusRepository implements BaseRepositoryContract
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

    public function publish($attributes, $id, array $options = null)
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();
            $this->validator->with($attributes)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        if (! is_null($options)){
            $result = $this->model->where($options[0],$attributes[$options[0]])->where('publicado',true)->get()->count();
            if($result >= 1){
                throw new GeneralException('Já existe um registro publicado ');
            }
        }

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        unset($attributes['posicao']);
        $attributes['publicado'] = true;

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

    public function unpublish($attributes, $id, array $options = null)
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();
            $this->validator->with($attributes)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $attributes['publicado'] = false;

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

}