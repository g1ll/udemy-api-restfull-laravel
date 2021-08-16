<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainApiController;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoApiController extends MainApiController
{
    protected $model;
    protected $upload;
    protected $path;

    public function __construct(Documento $doc, Request $req)
    {
        $this->model = $doc;
        $this->req = $req;
    }

    public function cliente($id)
    {
        $doc_ciente = $this->model->with('cliente')->find($id);
        return response()->json(
            (!$doc_ciente) ? ['error' => 'Id inválido!'] : $doc_ciente,
            (!$doc_ciente) ? 404 : 200
        );
    }
}
