<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class MainApiController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->all();
        // $data = $this->model->paginate(10);
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

        try {
            $this->validate($this->req, $this->model->rules());
            $dataForm = $this->req->all();
            // return response()->json($dataForm,201);
            if ($this->req->hasFile($this->upload) && $this->upload != null) { // && $this->req->file($this->uplaod)->isValid()){
                $extension = $this->req->file($this->upload)->extension();
                $imgName = uniqid(date('His')); //Unique ID based on date hour, minute and seconds.
                $nameFile = "$imgName.$extension";
                $upload = Image::make($this->req->file($this->upload))
                                ->resize($this->width, $this->height)
                                ->save(
                                    storage_path("app/publics/$this->path/$nameFile"),
                                    70);
                if (!$upload) {
                    throw new Exception("Uplado of file fail!");
                } else {
                    $dataForm[$this->upload] = $nameFile;
                }
            }
            $data = $this->model->create($dataForm);
            return response()->json($data, 201);
        } catch (Exception $error) {
            $error_msg = ['error'=>$error->getMessage()];

            if($error instanceof ValidationException)
                array_push($error_msg,['msg:'=>$error->errors()]);

            return response()->json($error_msg, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->model->find($id);
        return response()->json(
            (!$cliente) ? ['error' => 'Id inválido!'] : $cliente,
            (!$cliente) ? 404 : 200
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
        if (!$model = $this->model->find($id)) {
            return response()->json(['error' => 'Id inválido!'], 404);
        }
        $this->validate($this->req, $this->model->rules());
        $dataForm = $this->req->all();
        // return response()->json($dataForm,201);
        try {
            if ($this->req->hasFile($this->upload)) { // && $this->req->file($this->uplaod)->isValid()){
                $extension = $this->req->file($this->upload)->extension();
                $imgName = uniqid(date('His')); //Unique ID based on date hour, minute and seconds.
                $nameFile = "$imgName.$extension";
                dd($this->req[$this->upload]);
                $upload = Image::make($this->req[$this->upload])
                    ->resize($this->width, $this->height)
                    ->save(storage_path("app/public/$this->path/$nameFile"), 70);
                if (!$upload) {
                    return response()->json(['error', 'Save image fail!'], 500);
                } else {
                    if ($model->file($id))
                        Storage::disk('public')->delete("$this->path/{$model->file($id)}");
                    $dataForm[$this->upload] = $nameFile;
                }
            }
            //  else {
            //     return response()->json(['error' => 'Upload image fail!'], 400);
            // }
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 400);
        }

        $model->update($dataForm);
        return response()->json($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$model = $this->model->find($id))
            return response()->json(['error' => 'Id inválido!'], 404);

        if (method_exists($this->model, 'file'))
            Storage::disk('public')->delete("$this->path/{$this->model->file($id)}");

        $model->delete();
        return response()->json(['success' => 'registro removido!']);
    }
}
