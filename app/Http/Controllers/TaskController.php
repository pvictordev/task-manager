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
    public function editItem(Request $request, $id)
    {

        // Find the task item by its ID
        $taskItem = TaskItem::find($id);

        // Check if the task item exists
        if (!$taskItem) {
            return redirect()->back()->with('error', 'Task item not found.');
        }

        // Pass the task item to the edit view
        return view('edit', compact('taskItem'));
    }
    public function updateItem(Request $request, $id)
    {
        $taskItem = TaskItem::find($id);

        // Check if the task item exists
        if (!$taskItem) {
            return redirect()->back()->with('error', 'Task item not found.');
        }

        $request->validate([
            'taskItem' => 'required|string|max:255',
        ]);

        $taskItem->name = $request->taskItem;

        $taskItem->save();

        return redirect('/');
    }
}
