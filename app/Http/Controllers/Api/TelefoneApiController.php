<?php

namespace App\Http\Controllers\Api;

use App\Models\Telefone;
use App\Http\Controllers\MainApiController;
use Illuminate\Http\Request;

class TelefoneApiController extends MainApiController
{
    protected $model;
    protected $upload;
    protected $path;

    public function __construct(Telefone $telefone, Request $req)
    {
        $this->model = $telefone;
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
