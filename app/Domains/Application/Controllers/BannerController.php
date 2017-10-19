<?php

namespace App\Domains\Application\Controllers;

use App\Domains\Application\Repositories\Contracts\BannerRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class BannerController extends Controller
{

    private $bannerRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->middleware('auth');
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banners.index');
    }

    public function data(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->bannerRepository->with('parceiro')->query())
            ->editColumn('parceiro', function ($banner) {
                return $banner->parceiro->nome;
            })
            ->editColumn('limite', function ($banner) {
                return Carbon::createFromFormat('Y-m-d', $banner->data_limite)->format('d/m/Y');
            })
            ->editColumn('posicao', function ($banner) {
                switch ($banner->posicao) {
                    case 'T':
                        return 'TOPO';
                        break;
                    case 'B':
                        return 'BOX';
                        break;
                    case 'L':
                        return 'LATERAL';
                        break;
                }
            })
            ->editColumn('created_at', function ($banner) {
                return $banner->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($banner) {
                return view('banners.buttons')->with('banner', $banner);
            })
            ->make(true);
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
