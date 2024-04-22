<x-app-layout>

    <main class="p-6 pt-12 flex justify-center h-screen bg-gray-100 shadow-md">
        <div class="container flex-column items-center justify-between">
            <h1 class="text-3xl font-semibold mb-10">Create</h1>
            <div class="flex flex-row items-center justify-between mb-5">
                <form method="POST" action="{{route('storeItem')}}" accept-charset="UTF-8" class="flex items-center">
                    {{ csrf_field() }}
                    <label for="taskItem" class="mr-4 text-lg">Create a new task</label>
                    <input type="text" name="taskItem" class="px-4 py-2  bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" required />
                    <button type="submit" class="mx-3 px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Create</button>
                </form>
                <a class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" href="/markedRoute">
                    Marked
                </a>
            </div>

            @foreach ($taskItems as $taskItem)
            <div class="flex items-center justify-between mb-4 bg-white rounded-lg shadow-md px-4 py-3">
                <p class="text-lg">{{$taskItem->name}}</p>
                <div class="flex gap-2">
                    <form method="POST" action="{{route('markComplete', $taskItem->id)}}">
                        {{ csrf_field() }}
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Mark</button>
                    </form>
                    <form method="GET" action="{{route('editItem', $taskItem->id)}}">
                        {{ csrf_field() }}
                        <button class="px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-600">Edit</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</x-app-layout>