<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 25/10/2017
 * Time: 15:43
 */

namespace App\Domains\Frontend\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{

    public $noticiaRepository;

    public function __construct(NoticiaRepository $noticiaRepository)
    {
        $this->noticiaRepository = $noticiaRepository;
    }

    public function index()
    {
        return view('noticias.list_news');
    }
}