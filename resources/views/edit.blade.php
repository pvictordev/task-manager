<!-- resources/views/edit.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Edit</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
@vite('resources/css/app.css')

<body>

    <body>
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="text-white text-xl font-bold">Task Manager</a>

                <!-- Navigation Links -->
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-gray-300">Marked</a>
                </div>
            </div>
        </nav>

        <main class="p-6 flex justify-center h-screen bg-gray-100 rounded-lg shadow-md">
            <div class="container flex-column items-center justify-between">
                <h1 class="text-3xl font-semibold mb-10">Edit</h1>
                <form method="POST" action="{{ route('updateItem', $taskItem->id) }}" accept-charset="UTF-8" class="flex items-center mb-5">
                    @csrf
                    @method('PUT')
                    <label for="taskItem" class="mr-4 text-lg">Edit task name</label>
                    <input type="text" name="taskItem" id="taskItem" class="px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none" value="{{ $taskItem->name }}" />
                    <button type="submit" class="mx-3 px-6 py-2 bg-amber-500 text-white rounded-md hover:bg-amber-600">Update</button>
                </form>
            </div>
        </main>
    </body>
</body>