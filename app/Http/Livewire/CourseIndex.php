<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Course;
use App\Models\Category;
use App\Models\Level;

class CourseIndex extends Component
{
    /* Cualquier propiedad publica que se defina aqui se puede usar directamente en la vista del componente*/
    public $category_id;
    public $level_id;

    public function render()
    {

        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::where('status', 3)
                            ->category($this->category_id)
                            ->level($this->level_id)
                            ->latest('id')
                            ->paginate(8);
        
        return view('livewire.course-index', compact('courses', 'categories', 'levels'));
    }

    public function resetFilters()
    {
        $this->reset(['category_id', 'level_id']);
    }

}
