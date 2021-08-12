<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainApiController;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ClienteApiController extends MainApiController
{

    protected $model;
    protected $path = 'cliente';

    public function __construct(Cliente $clientes, Request $req)
    {
        $this->model = $clientes;
        $this->req = $req;
        // $this->model = new Cliente();
    }


}
