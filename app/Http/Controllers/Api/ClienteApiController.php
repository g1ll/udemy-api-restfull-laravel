<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ClienteApiController extends Controller
{
    public function __construct(Cliente $cliente, Request $req)
    {
        $this->cliente = $cliente;
        $this->req = $req;
        // $this->model = new Cliente();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->cliente->all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate($this->req, $this->cliente->rules());
        $dataForm = $this->req->all();
        // return response()->json($dataForm,201);
        try {
            if ($this->req->hasFile('image')) { // && $this->req->file('image')->isValid()){
                $extension = $this->req->image->extension();
                $imgName = uniqid(date('His')); //Unique ID based on date hour, minute and seconds.
                $nameFile = "$imgName.$extension";
                $upload = Image::make($this->req->image)->resize(177, 236)
                    ->save(storage_path("app/public/clientes/$nameFile"), 70);
                if (!$upload) {
                    return response()->json(['error', 'Uplado of file fail!'], 500);
                } else {
                    $dataForm['image'] = $nameFile;
                }
            } else {
                return response()->json(['error' => 'Upload image fail!'], 400);
            }
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 400);
        }

        $data = $this->cliente->create($dataForm);
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        return response()->json(
            (!$cliente) ?
                ['error' => 'Id inválido!']
                : $cliente,
            404
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
