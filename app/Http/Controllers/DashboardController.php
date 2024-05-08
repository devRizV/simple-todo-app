<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Todo::where('user_id', '=', Auth::user()->id)->get();

        return view('todo.dashboard', compact('tasks'));

    }
    public function test()
    {
        return view('todo.test');

    }
}
