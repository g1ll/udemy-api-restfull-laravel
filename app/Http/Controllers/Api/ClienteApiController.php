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
    public function __construct(Cliente $cliente, Request $req)
    {
        $this->model = $cliente;
        $this->req = $req;
        // $this->model = new Cliente();
    }


}
