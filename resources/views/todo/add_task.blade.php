            <div class="add_task hidden bg-gray-200 my-3 rounded-2xl w-1/2 opacity-0 scale-y-0" id="add_task_div">
                <div class="inline-flex">
                    <form action="{{ route('store_task') }}" method="post">
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
                                <x-primary-button>
                                    {{ __('Save') }}
                                </x-primary-button>               
                            </div>

                        </div>
                    </form>
                </div>
            </div>