<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white h-12 px-4 shadow rounded-lg text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>Todos los cursos
            </button>

                <div class="relative" x-data="{open: false}">
                    <button x-on:click="open = !open" class="px-4 bg-white h-12 shadow focus:outline-none rounded-lg text-gray-700 mr-4">
                        <i class="fas fa-tag text-sm mr-2"></i>
                        Categoría
                        <i class="fas fa-angle-down text-sm ml-2"></i> 
                    </button>
                    

                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                        
                        @foreach ($categories as $category)
                            <a wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false" class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 hover:bg-blue-500 hover:text-white rounded">{{$category->name}}</a>    
                        @endforeach
                        
                    </div>
                </div>
                
                <div class="relative" x-data="{open: false}">
                    <button x-on:click="open = !open" class="px-4 bg-white h-12 shadow focus:outline-none rounded-lg text-gray-700 mr-4">
                        <i class="fas fa-glasses text-sm mr-2"></i>
                        Niveles
                        <i class="fas fa-angle-down text-sm ml-2"></i> 
                    </button>
    
                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                        @foreach ($levels as $level)
                            <a wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false" class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 hover:bg-blue-500 hover:text-white rounded">{{$level->name}}</a>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)
            <article class="bg-white shadow-lg rounded overflow-hidden">
                <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
                <div class="px-6 py-4">
                    <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($course->title, 40)}}</h1>
                    <p class="text-gray-500 mb-2">Prof: {{$course->teacher->name}}</p>

                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1"><i class="fas fa-star text-{{($course->rating >= 1) ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{($course->rating >= 2) ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{($course->rating >= 3) ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{($course->rating >= 4) ? 'yellow' : 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{($course->rating >= 5) ? 'yellow' : 'gray'}}-400"></i></li>
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto">
                            <i class="fas fa-users"></i>
                            ({{$course->students_count}})
                        </p>
                    </div>
                    <a href="{{route('courses.show', $course)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2">Más información</a>
                </div>
            </article>
        @endforeach

    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>

</div>
