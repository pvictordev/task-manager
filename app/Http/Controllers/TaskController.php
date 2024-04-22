<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

// import the model
use App\Models\TaskItem;
use App\Models\UserTask;


class TaskController extends Controller
{
    public function index()
    {
        // get in the view all the items
        return view('welcome');
    }
    public function storeItem(Request $request)
    {
        $newTaskItem = new TaskItem;
        $newTaskItem->name = $request->taskItem;
        $newTaskItem->is_complete = 0;
        $newTaskItem->save();

        // Create user_task record
        // this is not working
        $userId = Auth::id();
        $newUserTask = new UserTask;
        $newUserTask->user_id = $userId;
        $newUserTask->task_item_id = $newTaskItem->id;
        $newUserTask->save();

        return redirect('/dashboard');
    }
    public function unmarked()
    {
        /** @var User $user */ // Type hinting for $user variable
        // Get the authenticated user
        $user = Auth::user();

        $unmarkedNotes = $user->taskItems()->where('is_complete', 0)->get();

        return view('dashboard', ['taskItems' => $unmarkedNotes]);
    }
    public function marked()
    {
        /** @var User $user */ // Type hinting for $user variable
        // Get the authenticated user
        $user = Auth::user();
        $unmarkedNotes = $user->taskItems()->where('is_complete', 1)->get();

        return view('marked', ['taskItems' => $unmarkedNotes]);
    }

    public function markComplete($id)
    {
        // get in the view all the items
        $taskItem = TaskItem::find($id);
        $taskItem->is_complete = 1;
        $taskItem->save();

        return redirect('/markedRoute');
    }

    public function unmark($id)
    {
        // get in the view all the items
        $taskItem = TaskItem::find($id);
        $taskItem->is_complete = 0;
        $taskItem->save();

        return redirect('/dashboard');
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

        return redirect('/dashboard');
    }
    public function deleteItem($id)
    {
        $taskItem = TaskItem::find($id);

        // Check if the task item exists
        if (!$taskItem) {
            return redirect()->back()->with('error', 'Task item not found.');
        }

        $taskItem->delete();

        return redirect('/markedRoute');
    }
}
