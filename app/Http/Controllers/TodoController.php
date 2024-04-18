<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\ValidatedData;
use App\Models\Todo;


class TodoController extends Controller
{
    public function store_task(Request $request) {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'task_desc' => 'nullable|string|max:500',
        ]);

        $todo = Todo::create([
            'title' => $validatedData['title'],
            'task_desc' => $validatedData['task_desc'],

            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Task created successfully');
    }

    public function show_task() {
        $tasks = Todo::where('user_id', '=', Auth::user()->id)->get();
        return view('todo.todo_list', compact('tasks'));
    }

    public function update_task(Request $request, $id)
    {
        $task = Todo::findOrFail($id); // Use findOrFail to throw a 404 error if the task is not found

        if ($task->is_completed === 'false') {
            $task->is_completed = 'true';
            $task->save();
            return redirect()->route('todo_list')->with('success', 'Task updated successfully');
        } else {
            return redirect()->route('todo_list')->with('error', 'Task is already completed');
        }
    }

    public function edit_task(Request $request, $id) {
        $task = Todo::findOrFail($id);
        return view('todo.edit_task', compact('task'));
    }

    public function task_update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'task_desc' => 'nullable|string|max:500',
        ]);

            

        $task = Todo::findOrFail($id)->update([
                'title'=>$validatedData['title'],
            'task_desc'=>$validatedData['task_desc'],
        ]);

        return redirect()->route('todo_list')->with('success', 'Task updated successfully');
    }
    
    public function delete_task($id){
        
        try {

            $task = Todo::where('id', $id)
                        ->where('is_completed', '=', 'false')
                        ->firstOrFail();

        } catch (ModelNotFoundException $e) {

            return redirect()->route('todo_list')->with('success', "Task can't be deleted");
            
        }

        $task->delete();

        return redirect()->route('todo_list')->with('success', 'Task deleted successfully');
    }

}
