<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainApiController;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteApiController extends MainApiController
{

    protected $model;
    protected $path = 'clientes';
    protected $upload = 'image';
    protected $width = 177;
    protected $height = 236;
    protected $totalPage = 20;

    public function __construct(Cliente $clientes, Request $req)
    {
        $this->model = $clientes;
        $this->req = $req;
    }

    public function index()
    {
        $data = $this->model->paginate($this->totalPage);
        return response()->json($data);
    }

    public function documento($id)
    {
        $doc_ciente = $this->model->with('documento')->find($id);
        return response()->json(
            (!$doc_ciente) ? ['error' => 'Id inválido!'] : $doc_ciente,
            (!$doc_ciente) ? 404 : 200
        );
    }

    public function telefones($id)
    {
        $telefones = $this->model->with('telefone')->find($id);
        return response()->json(
            (!$telefones) ? ['error' => 'Id inválido!'] : $telefones,
            (!$telefones) ? 404 : 200
        );
    }

    public function alugados($id)
    {
        $alugados = $this->model->with('filmesAlugados')->find($id);
        return response()->json(
            (!$alugados) ? ['error' => 'Id inválido!'] : $alugados,
            (!$alugados) ? 404 : 200
        );
    }


}
