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
            return reponse()->json(ApiError::errorMessage('Erro ao atualizar os dados', 1010));
        }
    }
}
