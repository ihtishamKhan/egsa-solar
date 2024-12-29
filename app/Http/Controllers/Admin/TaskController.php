<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        
        $employees = User::role('Employee')->get();

        return view('admin.tasks.index', compact('tasks', 'employees'));
    }

    public function create()
    {
        $employees = User::where('role', 'Employee')->get();
        
        return view('admin.tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duedate' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
        ]);

        $request->request->add(['created_by' => auth()->user()->id]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('admin.tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('admin.tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duedate' => 'required',
            'status' => 'required',
            'priority' => 'required',
        ]);

        $task = Task::find($id);
        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
