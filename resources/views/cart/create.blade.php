<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('shops.store') }}">
                        @csrf
                        <div>
                            <div>
                                <label for="name">Name:</label>
                            </div>
                            <input type="text" name="name" id="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>
                        <div>
                            <div>
                                <label for="name">Phone number:</label>
                            </div>
                            <input type="text" name="phone" id="phone" value="998" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>
                        <div>
                            <div>
                                <label for="name">email:</label>
                            </div>
                            <input type="text" name="email" id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>
                        <div>
                            <div>
                                <select class="form-select">
                                    @foreach($bazars as $bazar)
                                        <option>{{ $bazars->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="email" id="email" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>
                        <div>
                            <div>
                                <label for="name">Password:</label>
                            </div>
                            <input type="password" name="password" id="password" value="123456789" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
{{--                        {{ $category->name }}--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
