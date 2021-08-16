<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainApiController;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoApiController extends MainApiController
{
    protected $model;

    public function __construct(Documento $doc, Request $req)
    {
        $this->model = $doc;
        $this->req = $req;
    }
}
