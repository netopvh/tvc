<?php
namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;
use Illuminate\Http\Request;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class RoleController extends Controller
{

    public $roleRepository;

    public $permissionRepository;

    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->middleware('auth');

        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        return view('access.roles.index')
            ->with('roles', $this->roleRepository->all());
    }

    public function create()
    {
        return view('access.roles.add')
            ->with('permissions',$this->permissionRepository->all());
    }

    public function store(Request $request)
    {
        try{
            $this->roleRepository->create($request->all());
            return redirect()->route('admin.roles')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
    }

    public function edit($id)
    {
        try{
            return view('access.roles.edit')
                ->with('role',$this->roleRepository->find($id))
                ->with('permissions',$this->permissionRepository->all());
        }catch (\Exception $e){
            return redirect()->route('admin.roles')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function update($id, Request $request)
    {
        try{
            $this->roleRepository->find($id);

            $this->roleRepository->update($request->all(), $id);

            return redirect()->route('admin.roles')->with('success','Registro alterado com sucesso!');
        }catch (\Exception $e){
            return redirect()->route('admin.roles')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    public function destroy($id)
    {
        try{
            $this->roleRepository->find($id);

            $this->roleRepository->delete($id);

            return redirect()->route('admin.roles')->with('success','Registro removido com sucesso!');
        }catch (\Exception $e){
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

}