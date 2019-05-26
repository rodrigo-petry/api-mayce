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
        $this->$partnerRequest = $partnerRequest;
    }

    public function index ()
    {
        return $this->partnerRequest->all();
    }

    public function show (PartnerRequest $id)
    {
        return $id;
    }
}
