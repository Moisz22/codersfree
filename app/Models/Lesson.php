<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    //asignacion masiva(campos que se quiere evitar que se asignen)
    protected $guarded = ['id'];

    //relacion uno a uno
    public function description()
    {
        return $this->hasOne('App\Models/Description');
    }

    //relacion uno a muchos inverso
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //relacion uno a muchos polimorfica
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
