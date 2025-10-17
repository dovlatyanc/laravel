<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function showAll()
    {
        return view('tasks.all', ['tasks' => Task::getAll()]);
    }

    public function showOne($id)
    {
        $task = Task::findById($id);
        return view('tasks.one', ['task' => $task]);
    }

    public function showEdit($id)
    {
        $task = Task::findById($id);
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

        Task::create($request->title, $request->due);

        return redirect()->route('tasks.index')->with('success', 'Задача добавлена!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'due'   => 'required|date',
        ]);

        Task::update((int)$id, $request->title, $request->due);

        return redirect()->route('tasks.show', $id)->with('success', 'Задача обновлена!');
    }
}