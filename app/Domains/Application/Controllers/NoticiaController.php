<?php

namespace App\Domains\Application\Controllers;

use App\Domains\Application\Repositories\Contracts\NoticiaRepository;
use App\Exceptions\Access\GeneralException;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\DataTables;
use Intervention\Image\ImageManager;

class NoticiaController extends Controller
{

    /**
     * @var NoticiaRepository
     */
    private $noticiaRepository;

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
        NoticiaRepository $noticiaRepository,
        ImageManager $imageIntervetion
    )
    {
        $this->middleware('auth');
        $this->noticiaRepository = $noticiaRepository;
        $this->imageIntervetion = $imageIntervetion;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('noticias.index');
    }

    public function data(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->noticiaRepository->query())
            ->editColumn('titulo',function($noticia){
                return str_limit($noticia->titulo,35);
            })
            ->editColumn('destaque', function($noticia){
                return $noticia->destaque?'<span class="label label-success">Sim</span>':'<span class="label label-danger">Não</span>';
            })
            ->editColumn('publicado',function($noticia){
                return $noticia->publicado? '<span class="label label-success">Publicado</span>':'<span class="label label-danger">Não Publicado</span>';
            })
            ->editColumn('autor',function($noticia){
                return is_null($noticia->autor)?'Não atribuído':$noticia->autor;
            })
            ->editColumn('created_at', function ($noticia) {
                return $noticia->created_at->format('d/m/Y');
            })
            ->addColumn('action', function ($noticia){
                return view('noticias.buttons')->with('noticia',$noticia);
            })
            ->rawColumns(['action','destaque','publicado'])
            ->make(true);
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('imagem')) {
                if ($this->uploadImage($request->file('imagem'))){
                    $attribute = $request->all();
                    $attribute['img_destaque'] = $this->filename;
                    $this->noticiaRepository->create($attribute);
                }
            }else{
                $this->noticiaRepository->create($request->all());
            }
            return redirect()->route('admin.noticias')->with('success', 'Registro inserido com sucesso!');
        } catch (ValidatorException $e) {
            return redirect()->back()->with('errors', $e->getMessageBag());
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            return view('noticias.edit')
                ->with('noticia', $this->noticiaRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function update($id, Request $request)
    {


        try {
            $this->noticiaRepository->find($id);

            if ($request->hasFile('imagem')) {
                if ($this->uploadImage($request->file('imagem'))){
                    $attribute = $request->all();
                    $attribute['imagem'] = $this->filename;
                    $this->noticiaRepository->update($attribute,$id);
                }
            }else{
                $this->noticiaRepository->update($request->all(),$id);
            }
            return redirect()->route('admin.noticias')->with('success','Registro atualizado com sucesso');
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
            $this->noticiaRepository->find($id);

            $this->noticiaRepository->delete($id);

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

            $this->noticiaRepository->publish($request->all(), $id);

            return redirect()->back()->with('success','Registro atualizado com sucesso');
        }catch (GeneralException $e){
            return redirect()->back()->with('errors',$e->getMessage());
        }
        catch (\Exception $e) {
            return redirect()->back()->with('errors',$e->getMessage());
        }
    }

    public function unpublish($id, Request $request)
    {
        try {
            $this->noticiaRepository->find($id);

            $this->noticiaRepository->unpublish($request->all(), $id);

            return redirect()->back()->with('success','Registro atualizado com sucesso');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->back(w)->with('errors','Nenhum registro localizado no banco de dados');
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
            $this->imageIntervetion->make($file->getRealPath())
                ->resize(270, 230)
                ->rectangle(0, 0, 269, 229, function ($draw) {
                    $draw->border(1, '#e5e6e8');
                })
                ->insert(public_path('frontend/images/watermark.png'),'bottom-right',5,5)
                ->save(public_path('storage/noticias/' . $this->filename), 90);
            return true;
        }
        return false;
    }
}
