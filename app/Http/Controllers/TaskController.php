<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// import the model
use App\Models\TaskItem;

class TaskController extends Controller
{
    public function index()
    {
        // get in the view all the items
        return view('welcome', ['taskItems' => TaskItem::where('is_complete', 0)->get()]);
    }
    public function markComplete($id)
    {
        // get in the view all the items
        $taskItem = TaskItem::find($id);
        $taskItem->is_complete = 1;
        $taskItem->save();

        return redirect('/');
    }
    public function storeItem(Request $request)
    {
        $newTaskItem = new TaskItem;
        $newTaskItem->name = $request->taskItem;
        $newTaskItem->is_complete = 0;
        $newTaskItem->save();

        return redirect('/');
    }
}
