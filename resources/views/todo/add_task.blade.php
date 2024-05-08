  
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="isOpen" @click.away="isOpen=false">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75">
                </div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;
            </span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form action="" id="add_task_form" class="add_task_form">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-400 text-white sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Icon or image for the modal -->
                                <span class="fas fa-plus fa-xl bg-blue-400 text-white"></span>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 bg-gray-100 rounded-2xl p-3" id="modal-headline">
                                    Add Task
                                </h3>
                                <div class="mt-4">
                                    <!-- Modal content goes here -->
                                    <div class="mx-2">
                                        <x-input-label >
                                            {{ __('Task Name')  }}
                                        </x-input-label>
                                        <x-text-input class="my-1" name="title" placeholder="Enter Task Name"/>
                                    </div>
    
                                    <div class="mx-2">
                                        <x-input-label >
                                            {{ __('Task Description')  }}
                                        </x-input-label>
                                        <textarea name="task_desc" cols="25" rows="3" class="my-1 rounded-xl" placeholder="Enter Task Description"></textarea>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" @click="isOpen=false" class="createTaskButton w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button type="button" @click="isOpen=false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
