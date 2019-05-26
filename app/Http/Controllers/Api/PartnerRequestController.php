<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\PartnerRequest;
use App\Http\Controllers\Controller;

class PartnerRequestController extends Controller
{
    private $partnerRequest;

    public function __construct(PartnerRequest $partnerRequest)
    {
        $this->partnerRequest = $partnerRequest;
    }

    public function index ()
    {
        return $this->partnerRequest->all();
    }

    public function show (PartnerRequest $id)
    {
        $partnerRequest = $this->partnerRequest->find($id);

        return $id;
    }

    public function store (Request $request)
    {
        try {
            $partnerRequestData = $request->all();
            $this->partnerRequest->create($partnerRequestData);

            return response()->json(['message' => 'Seu pedido para se tornar um parceiro foi enviado com sucesso!'], 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010));
            }
            return reponse()->json(ApiError::errorMessage('Ops, o cadastro do parceiro não foi realizado!', 1010));
        }
    }

    public function update (Request $request, $id)
    {
        try {
            $partnerRequestData = $request->all();
            $partnerRequest = $this->partnerRequest->find($id);
            $partnerRequest->update($partnerRequestData);

            return response()->json(['message' => 'Parceiro atualizado com sucesso!'], 201);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011));
            }
            return reponse()->json(ApiError::errorMessage('Ops, o parceiro não foi atualizado!', 1011));
        }
    }

    public function delete (PartnerRequest $id)
    {
        try {
            $id -> delete();

            return response()->json(['message' => 'Parceiro ' . $id->name  . ' removido(a) com sucesso!'], 200);

        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012));
            }
            return reponse()->json(ApiError::errorMessage('Ops, o parceiro não foi removido!', 1012));
        }
    }
}
