<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $search = $request->query('search');

        $tasks = Task::query();

        if ($status == 'completed') {
            $tasks->where('completed', true);
        } elseif ($status == 'incomplete') {
            $tasks->where('completed', false);
        }

        if ($search) {
            $tasks->where('title', 'like', '%' . $search . '%');
        }

        $tasks = $tasks->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::all();
        return view('tasks.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task = new Task();
        $task->title = $request->input('title');
        $task->category_id = $request->input('category_id');
        $task->priority = $request->input('priority');
        $task->deadline = $request->input('deadline');
        $task->completed = false;
        $task->save();

        $status = $request->input('status', 'all');
        return redirect()->route('tasks.index', ['status' => $status])->with('flash_message', '新しくリストを追加しました。');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $categories  = Category::all();

        return view('tasks.edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:20',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task->title = $request->input('title');
        $task->category_id = $request->input('category_id');
        $task->priority = $request->input('priority');
        $task->deadline = $request->input('deadline');
        $task->completed = $request->boolean('completed', $task->completed);
        $task->save();

        $status = $request->input('status', 'all');
        return redirect()->route('tasks.index', ['status' => $status])->with('flash_message', 'リストを編集しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        $status = $request->input('status', 'all');
        return redirect()->route('tasks.index', ['status' => $status])->with('flash_message', 'リストを削除しました。');
    }
}
