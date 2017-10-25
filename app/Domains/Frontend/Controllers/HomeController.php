<?php

namespace App\Domains\Frontend\Controllers;

use App\Domains\Application\Repositories\Contracts\BannerRepository;
use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * @var NoticiaRepository
     */
    public $noticiaRepository;

    /**
     * @var BannerRepository
     */
    public $bannerRepository;

    public function __construct(
        NoticiaRepository $noticiaRepository,
        BannerRepository $bannerRepository
    )
    {
        $this->noticiaRepository = $noticiaRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return mixed
     */
    public function index()
    {
        //dd($this->bannerRepository->findWhere(['posicao' => 'T', 'publicado' => 1]));
        return view('index')
            ->with('top_banner',$this->bannerRepository->findWhere(['posicao' => 'T', 'publicado' => 1]))
            ->with('box_banner',$this->bannerRepository->findWhere(['posicao' => 'B', 'publicado' => 1]))
            ->with('noticias', $this->noticiaRepository->all())
            ->with('destaques', $this->noticiaRepository->scopeQuery(function ($query) {
                return $query->take(3);
            })->orderBy('created_at', 'desc')->findWhere(['destaque' => true, 'publicado' => true]));
    }
}
