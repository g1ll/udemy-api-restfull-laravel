<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'image',
        'cpf_cnpj'
    ];

    public function rules()
    {
        return [
            'nome'=>'required',
            'image'=>'image',
            'cpf_cnpj'=>'required|unique:clientes'
        ];
    }

    public function file($id)
    {
        $file = $this->find($id);
        return $file->image;
    }
}
