<x-app-layout>

   
    <x-slot name='header'>

        <x-secondary-button id="show_add_task">
            {{ __('Add Task')}} <span id="up-down" class="text-gray-500 ml-4 fas fa-angle-down"></span>
        </x-secondary-button>
        
        @include('todo.add_task')

    </x-slot>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <div class="m-4">
        <table class="w-full border border-gray-400 bg-white shadow-lg shadow-blue-500 rounded-2xl">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Task#</th>
                    <th class="px-4 py-2 text-left">Task Name</th>
                    <th class="px-4 py-2 text-left">Task Details</th>
                    <th class="px-4 py-2 text-left">Task Status</th>
                    <th class="px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr class="border-b border-gray-400">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $task->title }}</td>
                    <td class="px-4 py-2">{{ $task->task_desc }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('update_task', $task->id)}}" method="post">
                            @csrf
                            <button type="" onclick="return confirm('{{$task->is_completed != 'false' ? 'The task is done' : 'Do you want to update task?'}}')">
                               
                                <span class="inline-block px-4 py-1 rounded-full text-white
                                    {{$task->is_completed != 'false' ? 'bg-green-500' : 'bg-red-500'}} ">

                                    {{$task->is_completed != 'false' ? 'Done' : 'Pending'}}
                                </span>
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="flex items-center justify-center">

                            @if ($task->is_completed === 'false')
                            
                            <a href="{{route('edit_task', $task->id)}}" class="mx-2"> <span class="fas fa-edit text-blue-500"></span></a>
                        
                            
                            <form action="{{ route('delete_task', $task->id) }}" method="post">
                                @csrf
                                <button onclick="return confirm('Do you want to delete this task')" >
                                    <span class="fas fa-trash text-red-600"></span>
                                </button>
                            </form>
                            @else
                                <span class="fas fa-check text-green-500"></span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script type="text/javascript"> 
       
        document.addEventListener("DOMContentLoaded", function() {

            const showAddTask = document.getElementById('show_add_task');
            const addTaskDiv = document.getElementById('add_task_div');
            const upDown = document.getElementById('up-down');

            addTaskDiv.classList.add('opacity-0', 'scale-y-0');

            showAddTask.addEventListener('click', function() {
                if (addTaskDiv.classList.contains('hidden')) {
                    upDown.classList.remove('fa-angle-down');
                    upDown.classList.add('fa-angle-up');

                    addTaskDiv.classList.remove('hidden');
                    setTimeout(() => {
                        addTaskDiv.classList.add('transition', 'duration-500', 'ease-in', 'transform', 'opacity-100', 'scale-y-100');
                    }, 50)
                } else {
                    upDown.classList.remove('fa-angle-up');
                    upDown.classList.add('fa-angle-down');
                    addTaskDiv.classList.remove('transition', 'duration-500', 'ease-in', 'transform', 'opacity-100', 'scale-y-100');
                    addTaskDiv.classList.add('transition', 'duration-500', 'ease-out', 'transform', 'opacity-0', 'scale-y-0');
                    setTimeout(() => {
                        addTaskDiv.classList.add('hidden');
                    }, 500);
                }
            });
        });

    </script>


</x-app-layout>