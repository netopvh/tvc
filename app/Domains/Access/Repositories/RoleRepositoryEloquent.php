<?php

namespace App\Domains\Access\Repositories;

use App\Exceptions\Access\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Models\Role;
use App\Domains\Access\Validators\RoleValidator;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class RoleRepositoryEloquent
 * @package namespace App\Domains\Access\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    public function validator()
    {
        return RoleValidator::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Save a new entity in repository
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        $attributes['display_name'] = $attributes['name'];

        $model = $this->model->newInstance($attributes);
        if($model->save()){
            $model->permissions()->sync($attributes['permissions']);
        }
        $this->resetModel();

        event(new RepositoryEntityCreated($this, $model));

        return $this->parserResult($model);
    }

    /**
     * @Override
     *
     * @throws GeneralException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $attributes['name'] = mb_strtolower($attributes['name'],"UTF-8");
        $attributes['display_name'] = mb_strtoupper(str_slug($attributes['name']),"UTF-8");

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        if($model->save()){
            $model->permissions()->sync($attributes['permissions']);
        }

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }

}
