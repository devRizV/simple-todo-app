<x-app-layout>

    <x-slot name='header'>
       

        <h2>Welcome, <span class="text-blue-500"> {{ Auth::user()->name }} </span>   </h2>

    </x-slot>
    <div class="flex">
        
        <div name="menu_list" class="flex items-center justify-center bg-gray-300 mx-2 my-2 p-2 rounded-xl shadow-md shadow-slate-700">
            <div name="task_menu" class="block bg-gray-200 w-auto mx-2 my-1 px-4 py-2 rounded-xl shadow-md shadow-orange-300 shad">
                Total Tasks:
                <span class="text-purple-300 font-bold"> {{ $tasks->count() }} </span>
                <br>
                Completed Tasks:
                <span class="text-green-500 font-bold">
                    {{ $tasks->filter(function ($task){
                        return $task->is_completed != 'false';
                    })->count() }}
                </span>
                <br>
                <a href="{{ route('todo_list') }}" class="text-blue-500">
                    >>>
                </a>
            </div>
        </div>
        
        <div name="menu_list" class="flex items-center justify-center bg-gray-300 mx-2 my-2 p-2 rounded-xl shadow-md shadow-slate-700">
            <div name="task_menu" class="block bg-gray-200 w-auto mx-2 my-1 px-4 py-2 rounded-xl shadow-md shadow-orange-300 shad">
                Tasks Last Added:
                <span class="text-red-500 font-bold"> 
                    {{ $tasks->sortBy('created_at')->first()->created_at }} 
                </span>
                <br>
                Task Last Completed:
                @if($tasks->filter(function ($task){
                    return $task->is_completed != 'false';
                })->sortBy('updated_at')->last() == null)
                    <span class="text-red-500 font-bold">
                        No tasks were done 
                    </span>
                @else
                    <span class="text-green-500 font-bold">
                        {{ $tasks->filter(function ($task){
                    return $task->is_completed != 'false';
                })->sortBy('updated_at')->last()->updated_at }}
                    </span>    
                @endif
                <br>
                <a href="{{ route('todo_list') }}" class="text-blue-500">
                    >>>
                </a>
            </div>
        </div>

    </div>


</x-app-layout>