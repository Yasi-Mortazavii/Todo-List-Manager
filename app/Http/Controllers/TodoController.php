<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::paginate(3);
        return view('Todos.index', compact('todos'));
    }

    public function show(Todo $todo){
        return view('Todos.show', compact('todo'));
    }

    public function create(){
        return view('Todos.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Todo::create([

            'title'       => $request->title,
            'description' => $request->description
        ]);
        alert()->success('تسک باموفقیت ایجاد شد', 'باتشکر');
        return redirect()->route('todos.index');
    }

    public function edit(Todo $todo){
        return view('Todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        alert()->warning('تسک باموفقیت ویرایش شد', 'باتشکر');
        return redirect()->route('todos.index');

    }
    public function delete(Todo $todo){

        $todo->delete();
        alert()->error('تسک باموفقیت حذف شد', 'باتشکر');
        return redirect()->route('todos.index');
    }

    public function complete(Todo $todo){

        $todo->update([
            'completed' => 1
        ]);
        alert()->success('تسک باموفقیت انجام شد', 'باتشکر');
        return redirect()->route('todos.index');
    }
}
