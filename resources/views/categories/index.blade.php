<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('Dashboard') }}--}}
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}">Add new category</a>
{{--                    {{ __("You're logged in!") }}--}}
                    <table>
                        <thead>
                        <tr>
                            <th style="border: 1px solid black">Name</th>
                            <th colspan="2" style="border: 1px solid black">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td style="border: 1px solid black">{{ $category->name }}</td>
                                <td style="border: 1px solid black">
                                    <a href="{{ route('categories.edit', $category) }}">Edit</a>
                                </td>
                                <td style="border: 1px solid black">
                                    <form method="POST" action="{{ route('categories.destroy', $category) }}">
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
