<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\ValidatedData;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index() {
        return view("todo/todo_list");
    }
    public function store_task(Request $request) {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'task_desc' => 'nullable|string|max:500',
        ]);

        $task = Todo::create([
            'title' => $validatedData['title'],
            'task_desc' => $validatedData['task_desc'],

            'user_id' => Auth::user()->id,
        ]);

        return response()->json([
                "task"=>$task,
            ]);
    }

    public function show_task(Request $request) {
        $tasks = Todo::where('user_id', '=', Auth::user()->id)->get();

        return response()->json([
                'tasks'=>$tasks,
            ]);
    }

    public function update_task(Request $request)
    {
        $id = $request->id;
        $task = Todo::findOrFail($id); 
        $task->is_completed = 'true';
        $task->save();

        return response()->json([
                'task'=>$task,
            ]);
    }


    public function edit_task(Request $request, $id) 
    {
        $task = Todo::findOrFail($id);
        return view('todo.edit_task', compact('task'));
    }

    public function task_update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'task_desc' => 'nullable|string|max:500',
        ]);

        $id = $request->id;

        $task = Todo::findOrFail($id)->update([
            'title'=>$validatedData['title'],
            'task_desc'=>$validatedData['task_desc'],
        ]);

        return response()->json([
            'task'=>$task,
        ]);
    }
    
    public function delete_task(Request $request)
    {  
        $id = $request->id;
        try {

            $task = Todo::where('id', $id)
                        ->where('is_completed', '=', 'false')
                        ->firstOrFail();

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message'=> 'The task not found!!' ,
            ]);
        }

        $task->delete();

        return response()->json([
            'task'=>$task,
            'message'=>'Task deleted successfully',
        ]);
    }

}
