<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 20/10/2017
 * Time: 21:05
 */

namespace App\Core\Repositories;


interface BaseRepositoryContract
{
    public function query();
    public function publish($attributes, $id, array $options = null);
    public function unpublish($attributes, $id, array $options = null);
}