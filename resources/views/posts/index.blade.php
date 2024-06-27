<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard') }}--}}
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}">Add new post</a>
                    <br><br>
{{--                    {{ __("You're logged in!") }}--}}
                    <table>
                        <thead>
                        <tr>
                            <th style="border: 1px solid black">Title</th>
                            <th style="border: 1px solid black">Text</th>
                            <th style="border: 1px solid black">Category</th>
                            <th colspan="2" style="border: 1px solid black">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td style="border: 1px solid black">{{ $post->title }}</td>
                                <td style="border: 1px solid black">{{ $post->text }}</td>
                                <td style="border: 1px solid black">{{ $post->category->name }}</td>
                                <td style="border: 1px solid black; background-color: dodgerblue;">
                                    <a href="{{ route('posts.edit', $post) }}">Edit</a>
                                </td>
                                <td style="border: 1px solid black; background-color: orangered;">
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
