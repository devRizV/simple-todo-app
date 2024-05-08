            <div class="add_task block absolute ml-10 bg-gray-200 my-3 rounded-2xl w-1/2 scale-y-0 z-10" id="add_task_div">
                <div class="inline-flex">
                    <form id="add_task_form">
                        @csrf

                        <div class="flex">

                            <div class="flex m-4">

                                <div class="mx-2">
                                    <x-input-label >
                                        {{ __('Task Name')  }}
                                    </x-input-label>
                                    <x-text-input class="my-1" id="title" name="title" placeholder="Enter Task Name" />
                                </div>

                                <div class="mx-2">
                                    <x-input-label >
                                        {{ __('Task Description')  }}
                                    </x-input-label>
                                    <textarea name="task_desc" id="task_desc" cols="25" rows="3" class="my-1 rounded-xl" placeholder="Enter Task Description"></textarea>
                                </div>
                                
                            </div>

                            <div class="flex items-center justify-end m-4">    
                                <x-primary-button class="save_task_button">
                                    {{ __('Save') }}
                                </x-primary-button>               
                            </div>

                        </div>
                    </form>
                </div>
            </div>

    <script type="module">
        $(document).ready(function(){
            
            let $showAddTask = $('#show_add_task');
            let $addTaskDiv = $('#add_task_div');
            let $upDown = $('#up-down');
            
            $showAddTask.on('click', function(){
                if($addTaskDiv.hasClass('scale-y-0')){
                    $upDown.removeClass('fa-angle-down').addClass('fa-angle-up');
                    $addTaskDiv.removeClass('transition duration-300 ease-out transform scale-y-0').addClass('transition ease-in duration-300 transform scale-y-100');
                }else{
                    $addTaskDiv.removeClass('transition duration-300 ease-in transform scale-y-100').addClass('transition duration-300 ease-out transform scale-y-0');
                    $upDown.removeClass('fa-angle-up').addClass('fa-angle-down');
                }
            });
        });
    </script>
 