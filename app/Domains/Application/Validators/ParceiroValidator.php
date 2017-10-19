<?php

namespace App\Domains\Application\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ParceiroValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required|unique:parceiros',
            'email' => 'required|unique:parceiros'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required',
            'email' => 'required'
        ],
   ];

    protected $messages = [
        'required' => 'O campo :attribute é obrigatório',
        'unique' => 'O :attribute já consta em nosso banco de dados'
    ];
}
