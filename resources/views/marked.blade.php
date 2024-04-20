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
                <h1 class="text-3xl font-semibold mb-10">Marked</h1>

                @foreach ($taskItems as $taskItem)
                <div class="flex items-center justify-between mb-4 bg-white rounded-lg shadow-md px-4 py-3">
                    <p class="text-lg">{{$taskItem->name}}</p>
                    <div class="flex gap-2">
                        <form method="POST" action="{{route('deleteItem', $taskItem->id)}}">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </body>
</body>