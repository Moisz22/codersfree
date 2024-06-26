<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //asignacion masiva(campos que se quiere evitar que se asignen)
    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];

    const BORRADOR=1;
    const REVISION=2;
    const PUBLICADO=3;

    public function getRatingAttribute()
    {
        if($this->reviews_count)
        {
            return round($this->reviews->avg('rating'), 1);
        }
        else
        {
            return 5;
        }
    }

    //query scopes
    public function scopeCategory($query, $category_id)
    {
        if($category_id)
        {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if($level_id)
        {
            return $query->where('level_id', $level_id);
        }
    }
    //fin query scopes

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirements');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audience()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    //relación uno a muchos inversa(se agrega la llave foranea por las convenciones de laravel, para poder cambiarle el nombre al método en vez de ponerle profesor)
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //relación muchos a muchos
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //relación uno a muchos
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    //relacion uno a muchos inversa
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    
    //relacion uno a muchos inversa
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }
    
    //relacion uno a muchos inversa
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    //relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
