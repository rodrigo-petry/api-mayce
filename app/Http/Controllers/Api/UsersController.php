<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;

class UsersController extends Controller
{
    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function index ()
    {
        return $this->users->all();
    }

    public function show (Users $id)
    {
        $users = $this->users->find($id);

        return $id;
    }

    public function store (Request $request)
    {
        try {
            $usersData = $request->all();
            $this->users->create($usersData);

            return response()->json(['message' => 'Cadastro realizado com sucesso!'], 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Ops, o cadastro do usuário não foi realiado', 1010));
        }
    }

    public function update (Request $request, $id)
    {
        try {
            $usersData = $request->all();
            $users = $this->users->find($id);
            $users->update($usersData);

            return response()->json(['message' => 'Usuário atualizado com sucesso!'], 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
            }
            return reponse()->json(ApiError::errorMessage('Ops, o usuário não foi atualizado!', 1011));
        }
    }

    public function delete (Users $id)
    {
        try {
            $id -> delete();

            return response()->json(['message' => 'Usuário ' . $id->name  . ' removido(a) com sucesso!'], 200);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
            }
            return reponse()->json(ApiError::errorMessage('Ops, o usuário não foi removido!', 1012));
        }
    }
}
