<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'cpf_cnpj',
    ];

    public function rules()
    {
        return [
            'client_id'=>'required',
            'cpf_cnpj'=>'required|unique:documentos'
        ];
    }
}
