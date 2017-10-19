<?php

namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userRepository;
    public $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));

        return view('access.users.index')
            ->with('users', $this->userRepository->paginate(10));
    }

    public function create()
    {

        return view('access.users.add')
            ->with('roles', $this->roleRepository->all());
    }

    public function store(Request $request)
    {
        try {

            $this->userRepository->create($request->all());
            return redirect()->route('admin.users')->with('success', 'Registro inserido com sucesso!');
        } catch (ValidatorException $e) {
            return redirect()->back()->with('errors', $e->getMessageBag());
        }
    }

    public function edit($id)
    {
        try {
            return view('access.users.edit')
                ->with('user', $this->userRepository->find($id))
                ->with('roles', $this->roleRepository->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Nenhum registro localizado no banco de dados');
        }
    }

    public function update($id, Request $request)
    {
        try {
            $this->userRepository->find($id);

            $this->userRepository->update($request->all(), $id);

            return redirect()->route('admin.users')->with('success', 'Registro alterado com sucesso!');
        }
        catch (ValidatorException $e){
            return redirect()->back()->with('errors', $e->getMessageBag());
        }
        catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Nenhum registro localizado no banco de dados.');
        }
    }

    public function destroy($id)
    {
        try {
            $this->userRepository->find($id);

            $this->userRepository->delete($id);

            return redirect()->route('admin.users')->with('success', 'Registro removido com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', 'Nenhum registro localizado no banco de dados.');
        }
    }

}