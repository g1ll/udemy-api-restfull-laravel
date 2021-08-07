<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteApiController extends Controller
{
    public function __construct(Cliente $cliente, Request $req)
    {
        $this->cliente = $cliente;
        $this->req=$req;
    }

    public function index()
    {
        // return response()->json('Hello, World!!!');
        $data = $this->cliente->all();
        dd($data);

    }
}
