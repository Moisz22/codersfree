<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //asignacion masiva(campos que se quiere evitar que se asignen)
    protected $guarded = ['id'];

    //relación 1 a 1 inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
