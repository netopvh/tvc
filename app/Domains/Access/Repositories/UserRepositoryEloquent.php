<?php

namespace App\Domains\Access\Repositories;

use App\Domains\Access\Validators\UserValidator;
use App\Exceptions\Access\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Models\User;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Validator\Contracts\ValidatorInterface;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Domains\Access\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name' => 'like',
        'email'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function validator()
    {
        return UserValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @override
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     *
     *
     */
    public function create(array $attributes)
    {
        if (!is_null($this->validator)) {
            $attributes = $this->model->newInstance()->forceFill($attributes)->toArray();

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        $model = $this->model->newInstance($attributes);
        if($model->save()){
            $model->roles()->attach($attributes['role_id']);
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

            $this->validator->with($attributes)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);

        $model = $this->model->findOrFail($id);
        $model->fill($attributes);
        if($model->save()){
            $model->roles()->detach();
            $model->roles()->attach($attributes['role_id']);
        }

        $this->skipPresenter($temporarySkipPresenter);
        $this->resetModel();

        event(new RepositoryEntityUpdated($this, $model));

        return $this->parserResult($model);
    }
}
