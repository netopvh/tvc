<?php

namespace App\Domains\Application\Controllers;

use App\Domains\Application\Repositories\Contracts\BannerRepository;
use App\Domains\Application\Repositories\Contracts\ParceiroRepository;
use App\Exceptions\Access\GeneralException;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManager;

class BannerController extends Controller
{

    /**
     * @var BannerRepository
     */
    private $bannerRepository;

    /**
     * @var ParceiroRepository
     */
    private $parceiroRepository;

    /**
     * @var $filename
     */
    private $filename;

    /**
     * @var ImageManager
     */
    private $imageIntervetion;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BannerRepository $bannerRepository,
        ParceiroRepository $parceiroRepository,
        ImageManager $imageIntervetion
    )
    {
        $this->middleware('auth');
        $this->bannerRepository = $bannerRepository;
        $this->parceiroRepository = $parceiroRepository;
        $this->imageIntervetion = $imageIntervetion;
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
                return is_null($banner->data_limite)?'Sem prazo':$banner->data_limite;
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
            ->editColumn('imagem', function ($banner) {
                return '<a href="'. asset('storage/banners/'.$banner->imagem) .'" data-popup="lightbox" class="btn-sm btn-primary"><i class="icon-search4"></i></a>';
            })
            ->editColumn('created_at', function ($banner) {
                return $banner->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($banner) {
                return view('banners.buttons')->with('banner', $banner);
            })
            ->editColumn('publicado',function($banner){
                return $banner->publicado? '<span class="label label-success">Publicado</span>':'<span class="label label-danger">Não Publicado</span>';
            })
            ->rawColumns(['action', 'imagem','publicado'])
            ->make(true);
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('imagem')) {
                if ($this->uploadImage($request->file('imagem'),$request->posicao)){
                    $attribute = $request->all();
                    $attribute['imagem'] = $this->filename;
                    $this->bannerRepository->create($attribute);
                    return redirect()->route('admin.banners')->with('success', 'Registro inserido com sucesso!');
                }
            }
        } catch (ValidatorException $e) {
            return redirect()->back()->with('errors', $e->getMessageBag());
        }
    }

    public function edit($id)
    {
        try {
            return view('banners.edit')
                ->with('parceiros',$this->parceiroRepository->all())
                ->with('banner', $this->bannerRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function update($id, Request $request)
    {
        try {
            $this->bannerRepository->find($id);

            if ($request->hasFile('imagem')) {
                if ($this->uploadImage($request->file('imagem'),$request->posicao)){
                    $attribute = $request->all();
                    $attribute['imagem'] = $this->filename;
                    $this->bannerRepository->update($attribute,$id);
                    return redirect()->route('admin.banners')->with('success','Registro atualizado com sucesso');
                }
            }
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->route('admin.banners')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function destroy($id)
    {
        try {
            $this->bannerRepository->find($id);

            $this->bannerRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function publish($id, Request $request)
    {
        try {
            //$this->bannerRepository->find($id);

            $this->bannerRepository->publish($request->all(), $id,['posicao']);

            return redirect()->back()->with('success','Registro atualizado com sucesso');
        }catch (GeneralException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
        catch (\Exception $e) {
            return redirect()->route('admin.banners')->with('errors',$e->getMessage());
        }
    }

    public function unpublish($id, Request $request)
    {
        try {
            $this->bannerRepository->find($id);

            $this->bannerRepository->unpublish($request->all(), $id);

            return redirect()->back()->with('success','Registro atualizado com sucesso');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->route('admin.banners')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Realiza o upload do arquivo
     *
     * @param $file
     */
    private function uploadImage($file, $option = null)
    {
        if ($file) {
            $this->filename = date('Y-m-d') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            if ($option) {
                switch ($option) {
                    case 'T':
                        $this->imageIntervetion->make($file->getRealPath())->resize(800, 130)->save(public_path('storage/banners/' . $this->filename), 90);
                        break;
                    case 'B':
                        $this->imageIntervetion->make($file->getRealPath())->resize(260,250)->save(public_path('storage/banners/'.$this->filename),90);
                        break;
                    case 'L':
                        $this->imageIntervetion->make($file->getRealPath())->resize(260,250)->save(public_path('storage/banners/'.$this->filename),90);
                        break;
                }
                return true;
            }
        }
        return false;
    }
}
