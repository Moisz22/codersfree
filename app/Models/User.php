<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relación uno a uno
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    //relación uno a muchos
    public function courses_dictated()
    {
        return $this->hasMany('App\Models\Course');
    }

    //relación uno a muchos
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    //relación muchos a muchos
    public function courses_enrolled()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    //relacion uno a muchos
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    //relacion uno a muchos
    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }
}
