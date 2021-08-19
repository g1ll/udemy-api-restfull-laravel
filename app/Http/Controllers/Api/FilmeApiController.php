<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\MainApiController;
use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeApiController extends MainApiController
{
    protected $model;
    protected $path = 'filmes';
    protected $upload = 'capa';
    protected $width = 800;
    protected $height = 533;

    public function __construct(Filme $filme, Request $req)
    {
        $this->model = $filme;
        $this->req = $req;
        // dd($req[$this->upload]);
    }
}
