<?php

namespace App\Domains\Application\Controllers;

use App\Domains\Application\Repositories\Contracts\NoticiaCategoriaRepository;
use App\Exceptions\Access\GeneralException;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;

class NoticiaCategoriaController extends Controller
{

    private $noticiaCategoriaRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        NoticiaCategoriaRepository $noticiaCategoriaRepository
    )
    {
        $this->middleware('auth');
        $this->noticiaCategoriaRepository = $noticiaCategoriaRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('noticia_categoria.index')
            ->with('categorias',$this->noticiaCategoriaRepository->paginate(10));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('noticia_categoria.create');
    }

    public function store(Request $request)
    {
        try {
            $this->noticiaCategoriaRepository->create($request->all());
            return redirect()->route('admin.categorias_noticias')->with('success', 'Registro inserido com sucesso!');
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
