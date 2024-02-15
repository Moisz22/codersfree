<?php

namespace App\Http\Controllers;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke() //invocar un único método
    {
        /* $courses = Course::where('status', 3)->get(); //curso aprobado

        return $courses; */

        $courses = Course::find(24)->where('status', 3)->latest()->get()->take(12);

        return view('welcome', compact('courses'));
    }
}