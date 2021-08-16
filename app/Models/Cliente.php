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
}
