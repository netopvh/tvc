<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 19/10/2017
 * Time: 22:10
 */

namespace App\Domains\Application\ViewComposers;

use Illuminate\View\View;
use App\Domains\Application\Repositories\Contracts\ParceiroRepository;

class ParceiroComposer
{
    /**
     * The user repository implementation.
     *
     * @var ParceiroRepository
     */
    protected $parceiros;

    /**
     * Create a new profile composer.
     *
     * @param  ParceiroRepository  $users
     * @return void
     */
    public function __construct(ParceiroRepository $parceiros)
    {
        // Dependencies automatically resolved by service container...
        $this->parceiros = $parceiros;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('parceiros', $this->parceiros->all());
    }

}