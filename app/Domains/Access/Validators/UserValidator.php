<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:users',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'role_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'status' => 'required'
        ],
   ];

    protected $messages = [
        'name.required' => 'O campo :attribute é obrigatório.',
        'name.unique' => 'O :attribute já consta em nosso banco de dados.',
        'username.required' => 'O campo :attribute é obrigatório.',
        'username.unique' => 'O :attribute já consta em nosso banco de dados.',
        'email.required' => 'O campo :attribute é obrigatório.',
        'email.unique' => 'O :attribute já consta em nosso banco de dados.',
        'email.email' => 'O :attribute não está em formato correto.',
        'password.required' => 'O campo :attribute é obrigatório.',
        'role_id.required' => 'O campo :attribute é obrigatório.',
        'status.required' => 'O campo :attribute é obrigatório.'
    ];
}
