<?php

namespace App\Domains\Frontend\Controllers;

use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * @var NoticiaRepository
     */
    public $noticiaRepository;


    public function __construct(
        NoticiaRepository $noticiaRepository
    )
    {
        $this->noticiaRepository = $noticiaRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return mixed
     */
    public function index()
    {
        \Carbon\Carbon::setLocale('pt_BR');
        return view('index')
            ->with('noticias', $this->noticiaRepository->with('categoria')->orderBy('created_at','desc')->all())
            ->with('destaques', $this->noticiaRepository->scopeQuery(function ($query) {
                return $query->take(3);
            })->orderBy('created_at', 'desc')->findWhere(['destaque' => true, 'publicado' => true]));
    }
}
