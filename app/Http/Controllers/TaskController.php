<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function showAll()
    {
        return view('tasks.all', ['tasks' => Task::all()]);
    }

    public function showOne($id)
    {
        $task = Task::findOrFail($id);;
        return view('tasks.one', ['task' => $task]);
    }

    public function showEdit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
    }

    public function create()
    {
        return view('tasks.edit');
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
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача добавлена!');
    }

    public function update(Request $request, $id)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'due'   => 'required|date',
            ]);

            $task = Task::findOrFail($id);
            $task->update([
                'title' => $request->title,
                'due'   => $request->due,
            ]);

            return redirect()->route('tasks.show', $id)->with('success', 'Задача обновлена!');
        }

   
     public function destroy($id)
        {
            $task = Task::findOrFail($id);
            $task->delete();

            return redirect()->route('tasks.index')->with('success', 'Задача удалена!');
        }
}