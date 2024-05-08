<div class="bg-slate-500 flex items-center justify-center">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
        
    <div class="flex items-center justify-center bg-cyan-800">
        <div class="block m-4">
            <h1>Task are shown here</h1>
                <div class="taskContainer flex m-2 pr-2 pl-1 py-0  w-1/2 rounded-2xl">
                    <div class="block item-center justify-center p-4 mx-2 my-2 w-4/5 rounded-2xl">
                    </div>
                </div>             
        </div>
    </div>