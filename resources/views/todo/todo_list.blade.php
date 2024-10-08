<x-app-layout>
   
    <x-slot name='header'>        
        <div x-data="{isOpen: false}">
            <div>
                <button type="button" @click="isOpen=true" class="bg-blue-900 text-white w-fit rounded-xl p-2 transition-all ease-in-out duration-300 hover:pl-6 hover:bg-blue-800">
                    Add task <span class="fa-solid fa-plus-circle fa-lg ml-1"></span>
                </button>
            </div>
            @include('todo.add_task')
        </div>
    </x-slot> 
    
        
        <div class="flex items-center  justify-center bg-cyan-900">
            <div class="block m-4 ">
                <table class="block shadow-lg shadow-black">
                    <thead class="bg-gray-100 rounded-xl">
                        <tr class="user">
                            <th colspan="5"></th>
                        </tr>
                        <tr>
                            <th class="py-4 px-4 mx-4 border-b-8 border-r-2 border-gray-400">#</th>
                            <th class="py-4 px-4 mx-4 border-b-8 border-r-2 border-gray-400">Title</th>
                            <th class="py-2 px-2 mx-4 border-b-8 border-r-2 border-gray-400">Description</th>
                            <th class="py-2 px-2 mx-4 border-b-8 border-r-2 border-gray-400">Status</th>
                            <th class="py-2 px-2 mx-4 border-b-8 border-r-2 border-gray-400">Action</th> 
                        </tr>
                    </thead>
                    <tbody> 
                    </tbody>
                </table>
            </div>
        </div>

    <script type="module">

        $(document).ready(function(){
            fetchTasks();

            function fetchTasks()
            {
                $.ajax({
                    type: 'GET',
                    url: "/show_task",
                    dataType: 'json',
                    success: function(response) {
                        
                        $('tbody').html('');
                        $.each(response.tasks, function(key, task){
                            
                            $('tbody').append(taskData(task));
                        });  
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching tasks:', error);
                    },
                });
            }

            $(document).on('click', '.createTaskButton',function(e)
            {
                e.preventDefault();
                
                const form = $(this).closest('form');
                const formData = form.serialize();
                $.ajax({
                    type: "POST",
                    url: "/store_task",
                    data: formData,
                    datatype: 'json',
                    success: function(response){
                        $("#add_task_form")[0].reset();
                        fetchTasks();
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    },
                });
            });

            $(document).on('click', '.confirmUpdateButton', function(e){
                    e.preventDefault();
                    const form = $(this).closest('form');
                    const formData = form.serialize();
                    $.ajax({
                        type:"POST",
                        url:"/update_task",
                        data: formData,
                        datatype: 'json',
                        success: function(response){
                            fetchTasks();
                        },
                        error:function(xhr, status, error){
                            console.log('Error:', error);
                        },
                    });
                });
                
                
                $(document).on('click', '.confirmDeleteButton', function(e){
                    e.preventDefault();
                    const form = $(this).closest('form');
                    const formData = form.serialize();
                    console.log(formData);
                    $.ajax({
                        type:"POST",
                        url:"/delete_task",
                        data: formData,
                        datatype: 'json',
                        success: function(response){
                            fetchTasks();
                            console.log(response.message);
                        },
                        error:function(xhr, status, error){
                            console.log('Error:', error);
                        },
                    });
                });
                
                $(document).on('click', '.saveEditButton', function(e){
                    e.preventDefault();
                    console.log('here');
                    const form = $(this).closest('form');
                    const formData = form.serialize();
                    $.ajax({
                        type:"POST",
                        url:"/task_update",
                        data: formData,
                        datatype: 'json',
                        success: function(response){
                            fetchTasks();
                            console.log(response.message);
                        },
                        error:function(xhr, status, error){
                            console.log('Error:', error);
                        },
                    });
                });

            
            function taskData(data){
                var taskEdit = `
                                <div x-data='{isOpen: false}' name="taskEdit">
                                    <button type="button" @click='isOpen=true'>
                                        <span class="fas fa-edit text-white bg-blue-950 rounded-full px-3 py-3 mx-2 transition-all ease-in-out duration-300 hover:text-blue-900 hover:bg-blue-500"></span>
                                    </button>

                                    @include('todo.edit_task')
                                </div>
                                `;

                var taskUpdate =`
                                <div x-data="{isOpen: false, confirmButtonClass: ''}">
                                    <button id="updateTaskButton${data.id}" name="updateTaskButton" class="update text-white" type="button" @click="isOpen=true; confirmButtonClass='confirmUpdateButton'"> 
                                        <span class="fas fa-check text-gray-700 transition-all ease-in-out duration-300 hover:text-white cursor-pointer bg-gray-500 hover:bg-green-500 rounded-full px-3 py-3 mr-2"></span>
                                    </button>
                    
                                    @include('todo.confirmAction')
                                </div>
                                `;

                var taskDelete =`
                                <div x-data="{isOpen:false, confirmButtonClass: ''}">
                                    <button id="deleteTaskButton${data.id}" name="deleteTaskButton" class="delete text-white" type="button" @click="isOpen=true; confirmButtonClass='confirmDeleteButton'"> 
                                        <span class="fa fa-trash text-white bg-red-500 rounded-full px-3 py-3 ml-2 transition-all ease-in-out duration-300 hover:text-red-900 hover:bg-white"></span> 
                                    </button>
                                    @include('todo.confirmAction')
                                </div>
                                `;

                var updateForm = `
                                    <form class="updateTaskForm" data-task-id = "${data.id}">
                                        @csrf
                                        <input type="hidden" name="id" value="${data.id}">
                                        <div class="flex m-0 p-0">
                                            
                                            ${taskUpdate}
                                                    
                                            ${taskEdit}

                                            ${taskDelete}
                                            
                                        </div>
                                    </form>
                                `;

                var TaskComplete = `
                                    <div class="flex content-center justify-center m-0 p-0">
                                        <span class="text-white rounded-full bg-green-600 px-3 py-3 fa-solid fa-check transition-all ease-in-out hover:bg-green-500"></span>
                                    </div>
                                `;

                var row = `   
                            <tr class="py-2 px-2 my-4 mx-2 ${(data.is_completed != "false" ? 'bg-gray-800 text-white' : "bg-red-700")} rounded-xl">
                                <td class="py-2 px-2 my-2 mx-4 "> ${data.id} </td>
                                <td class="py-2 px-2 my-2 mx-4 ">${data.title}</td>
                                <td class="py-2 px-2 my-2 mx-4 ">${data.task_desc}</td>
                                <td class="py-2 px-2 my-2 mx-4 ">${(data.is_completed != "false" ? 'Completed' : "Not Completed")}</td>
                                <td class="py-2 px-2 my-2 mx-4 ">
                                    ${(data.is_completed != "false" ? TaskComplete : updateForm)}
                                </td>
                            </tr>
                        `;
                        
                return row;
            }
        }); 
    </script>



</x-app-layout>