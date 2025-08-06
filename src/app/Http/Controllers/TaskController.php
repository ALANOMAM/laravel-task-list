<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('index', [
            'tasks' => Task::latest()->simplePaginate(3)
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        //if everything is validated correctly, i will get a data array with my info inside
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
        ]);
       //we create a new task
        $task = new Task;
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        //save changes to the database
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function show($id)
    {
        return view('show', [
            'task' => Task::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('edit', [
            'task' => Task::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {

        // dd($request);
         //if everything is validated correctly, i will get a data array with my info inside
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required',
            'completed' => 'required|boolean',
        ]);

        $task = Task::findOrFail($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->completed = $data['completed'];
        //save changes to the database
        $task->save();

        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
