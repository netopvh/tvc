<?php

namespace App\Domains\Application\Controllers;

use App\Domains\Application\Repositories\Contracts\ParceiroRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\DataTables;

class ParceiroController extends Controller
{

    private $parceiroRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParceiroRepository $parceiroRepository)
    {
        $this->middleware('auth');
        $this->parceiroRepository = $parceiroRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parceiros.index');
    }

    public function data(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->parceiroRepository->query())
            ->addColumn('action', function ($parceiro){
                return view('parceiros.buttons')->with('parceiro',$parceiro);
            })
            ->editColumn('cpf_cnpj', function ($parceiro){
                if($parceiro->tp_pessoa == 'F'){
                    return mask($parceiro->cpf_cnpj,"###.###.###-##");
                }else{
                    return mask($parceiro->cpf_cnpj,"##.###.###/####-##");
                }
            })
            ->editColumn('telefone',function($parceiro){
                return mask($parceiro->telefone,"(##) #####-####");
            })
            ->make(true);
    }

    public function create()
    {
        return view('parceiros.create');
    }

    public function store(Request $request)
    {
        try{
            $this->parceiroRepository->create($request->all());
            return redirect()->route('admin.parceiros')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            //dd($this->parceiroRepository->find($id));
            return view('parceiros.edit')->with('parceiro', $this->parceiroRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function update($id, Request $request)
    {
        try {
            $this->parceiroRepository->find($id);

            $this->parceiroRepository->update($request->all(), $id);

            return redirect()->route('admin.parceiros')->with('success','Registro atualizado com sucesso');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->route('admin.parceiros')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function destroy($id)
    {
        try {
            $this->parceiroRepository->find($id);

            $this->parceiroRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }
}
