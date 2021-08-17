<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Telefone extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'cliente_id',
    ];

    public function rules()
    {
        return [
            'cliente_id'=>'required',
            'numero'=>'required|max:20'
        ];
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
}
