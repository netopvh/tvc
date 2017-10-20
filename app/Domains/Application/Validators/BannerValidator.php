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
            'imagem' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'parceiro_id' => 'required',
            'posicao' => 'required',
            'imagem' => 'required'
        ],
   ];

    protected $messages = [
        'required' => 'O :attribute é obrigatório'
    ];

    protected $attributes = [
        'parceiro_id' => 'Parceiro',
        'posicao' => 'Posição',
        'imagem' => 'Imagem do Banner'
    ];
}
