<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 25/10/2017
 * Time: 18:59
 */

namespace App\Domains\Frontend\ViewComposers;

use Illuminate\View\View;
use App\Domains\Application\Repositories\Contracts\BannerRepository;

class BannerComposer
{

    /**
     * @var BannerRepository
     */
    protected $banner;

    /**
     * BannerComposer constructor.
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        // Dependencies automatically resolved by service container...
        $this->banner = $bannerRepository;
    }


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('top_banner',$this->banner->findWhere(['posicao' => 'T', 'publicado' => 1]));
        $view->with('box_banner',$this->banner->findWhere(['posicao' => 'B', 'publicado' => 1]));
    }
}