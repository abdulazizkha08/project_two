<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('users.create') }}">Add new User</a>
                    <br>
                    <br>
                    <table>
                        <thead>
                        <tr>
                            <th style="border: 1px solid black">Name</th>
                            <th colspan="2" style="border: 1px solid black">Contacts</th>
                            <th colspan="2" style="border: 1px solid black">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td style="border: 1px solid black">{{ $user->name }}</td>
                                <td style="border: 1px solid black">{{ $user->phone }}</td>
                                <td style="border: 1px solid black">{{ $user->email }}</td>
                                <td style="border: 1px solid black; background-color: dodgerblue;">
                                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                                </td>
                                <td style="border: 1px solid black; background-color: orangered;">
                                    <form method="POST" action="{{ route('users.destroy', $user) }}">
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
