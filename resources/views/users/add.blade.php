<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight uppercase">
            {{ __('Manajemen User') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="text-2xl mb-5 font-semibold text-gray-500">{{ $title }}</h4>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                        Name
                    </label>
                    <input type="text" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="name" {{ old('name') }}>
                </div>
                <div class="my-3">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                        Email
                    </label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="email" {{ old('email') }}>
                </div>
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">
                        Select role user
                    </label>
                    <select id="role" name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        {{-- <option selected >Choose a role user</option> --}}
                        <option {{ old('role') == '1' ? 'selected' : '' }} value="1">Admin</option>
                        <option {{ old('role') == '2' ? 'selected' : '' }} value="2">Operator</option>
                    </select>
                </div>
                <button type="submit"
                    class="px-3 py-2 mt-4 text-sm font-medium text-center text-white float-right bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
