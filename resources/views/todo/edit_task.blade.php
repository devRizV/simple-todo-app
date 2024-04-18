<x-app-layout>

    <x-slot name='header'>
        <h2>Add Task</h2>
    </x-slot>

    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <form action="{{ route('task_update', $task->id) }}" method="post">
                
                @csrf
                <div class="block">
                    <div class="m-4">

                        <x-input-label >Task Name</x-input-label>
                        <x-text-input id="title" name="title" value="{{ $task->title }}" />
                        <x-input-label>Task Description</x-input-label>
                        <textarea name="task_desc" id="task_desc" cols="20" rows="5">{{$task->task_desc}}</textarea>

                    </div>

                    <div class="m-4">    
                         <x-primary-button>Update</x-primary-button>               
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>