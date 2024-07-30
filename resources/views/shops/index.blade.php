<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shops') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('shops.create') }}">Add new Shop</a>
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
                        @foreach($shops as $shop)
                            <tr>
                                <td style="border: 1px solid black">{{ $shop->name }}</td>
                                <td style="border: 1px solid black">{{ $shop->phone }}</td>
                                <td style="border: 1px solid black">{{ $shop->email }}</td>
                                <td style="border: 1px solid black; background-color: dodgerblue;">
                                    <a href="{{ route('shops.edit', $shop) }}">Edit</a>
                                </td>
                                <td style="border: 1px solid black; background-color: orangered;">
                                    <form method="POST" action="{{ route('shops.destroy', $shop) }}">
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
