<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class RoleValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required'
        ],
   ];

    protected $messages = [
        'name.required' => 'O campo :attribute é obrigatório',
        'name.unique' => 'O :attribute já consta em nosso banco de dados.',
        'permissions.required' => 'O campo :attribute é obrigatório'
    ];
}
