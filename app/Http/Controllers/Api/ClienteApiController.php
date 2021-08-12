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

    public function __construct(Cliente $clientes, Request $req)
    {
        $this->model = $clientes;
        $this->req = $req;
    }


}
