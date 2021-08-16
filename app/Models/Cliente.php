<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'image',
    ];

    public function rules()
    {
        return [
            'nome'=>'required',
            'image'=>'image',
        ];
    }

    public function file($id)
    {
        $file = $this->find($id);
        return $file->image;
    }

    public function documento()
    {
        return $this->hasOne(Documento::class,'cliente_id','id');
    }
}
