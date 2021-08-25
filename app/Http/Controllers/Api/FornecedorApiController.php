<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\MainApiController;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorApiController extends MainApiController
{
    protected $model;
    protected $path = 'fornecedor';
    protected $upload = null;
    protected $width = 0;
    protected $height = 0;
    protected $totalPage = 20;

    public function __construct(Fornecedor $fornecedor, Request $req)
    {
        $this->model = $fornecedor;
        $this->req = $req;
    }
}
