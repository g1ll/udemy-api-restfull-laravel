<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';
    protected $primaryKey = 'id_fornecedore';
    public $timestamp = false;

    protected $fillable = [
        'nome',
    ];

    public function rules()
    {
        return [
            'nome'=>'required',
        ];
    }


}
