<!-- resources/views/edit.blade.php -->
@vite('resources/css/app.css')

<div class="p-6 h-screen bg-gray-100 rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold mb-6">Edit Task</h1>
    <form method="POST" action="{{ route('updateItem', $taskItem->id) }}" accept-charset="UTF-8" class="flex items-center mb-5">
        @csrf
        @method('PUT')
        <label for="taskItem" class="mr-4 text-lg">Edit task name</label>
        <input type="text" name="taskItem" id="taskItem" class="px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" value="{{ $taskItem->name }}">
        <button type="submit" class="mx-3 px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
    </form>
</div>