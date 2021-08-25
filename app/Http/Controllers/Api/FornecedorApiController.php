<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorApiController extends Controller
{
    protected $request;


    public function __construct(Request $req)
    {
        $this->request = $req;
    }
}
