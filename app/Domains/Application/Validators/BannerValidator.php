<?php

namespace App\Domains\Application\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BannerValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'parceiro_id' => 'required',
            'posicao' => 'required',
            'imagem' => 'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'parceiro_id' => 'required',
            'posicao' => 'required',
            'imagem' => 'required',
        ],
   ];

    protected $messages = [
        'required' => 'O :attribute é obrigatório',
        'unique' => 'já possui uma :attribute cadastrada com este tipo'
    ];

    protected $attributes = [
        'parceiro_id' => 'Parceiro',
        'posicao' => 'Posição',
        'imagem' => 'Imagem do Banner'
    ];
}
