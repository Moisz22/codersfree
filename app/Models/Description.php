<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    //asignacion masiva(campos que se quiere evitar que se asignen)
    protected $guarded = ['id'];

    //relacion uno a uno inversa
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
