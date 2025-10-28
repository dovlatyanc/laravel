<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Gate; 

class TaskController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

  
    public function showAll()
    {
        // Если админ — видит все задачи, иначе — только свои
        if (auth()->user()->isAdmin()) {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('user_id', auth()->id())->get();
        }

        return view('tasks.all', ['tasks' => $tasks]);
    }


    public function showOne($id)
    {
        $task = Task::findOrFail($id);

        Gate::authorize('view-task', $task);

        return view('tasks.one', ['task' => $task]);
    }


    public function create()
    {
        return view('tasks.edit'); // или tasks.form
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due'   => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'due'   => $request->due,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача добавлена!');
    }


    public function showEdit($id)
    {
        $task = Task::findOrFail($id);

       
        Gate::authorize('update-task', $task);

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

  
        Gate::authorize('update-task', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'due'   => 'required|date',
        ]);

        $task->update([
            'title' => $request->title,
            'due'   => $request->due,
        ]);

        return redirect()->route('tasks.show', $id)->with('success', 'Задача обновлена!');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);


        Gate::authorize('delete-task', $task);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Задача удалена!');
    }
}