
    
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="isOpen" @click.away="isOpen = false">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75">
                </div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;
            </span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <template x-if="confirmButtonClass === 'confirmUpdateButton' ">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-400 text-white sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Icon or image for the modal -->
                                    <div>
                                        <span class="fas fa-check fa-xl text-white"></span>
                                    </div>
                                </div>
                            </template>
                            <template x-if="confirmButtonClass === 'confirmDeleteButton' ">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-400 text-white sm:mx-0 sm:h-10 sm:w-10">
                                    <div>
                                        <span class="fas fa-x fa-xl text-white"></span>
                                    </div>
                                </div>
                            </template>

                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <template x-if="confirmButtonClass === 'confirmUpdateButton' ">
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-green-900 bg-green-100 rounded-2xl p-3" id="modal-headline">
                                            Task Completion
                                        </h3>
                                        <div class="mt-4">
                                            <p> Do you want to confirm task completion </p>                                    
                                        </div>
                                    </div>
                                </template>
                                <template x-if="confirmButtonClass === 'confirmDeleteButton' ">
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-red-500 bg-red-100 rounded-2xl p-3" id="modal-headline">
                                            Task Deletion
                                        </h3>
                                        <div class="mt-4">
                                            <p class="">Do you want to delete the task?</p>                                
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" @click="isOpen=false" :class="confirmButtonClass" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Confirm
                        </button>
                        <button type="button" @click="isOpen=false"  class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
            </div>
        </div>
    </div>