<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight uppercase">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4 class="text-2xl mb-5 font-semibold text-gray-500">{{ $title }}</h4>
            @foreach ($supplier as $u)
                <form action="{{ route('supplier.update', $u->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                            Name
                        </label>
                        <input type="text" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="nama_supplier" value="{{ $u->nama_supplier }}">
                    </div>
                    <div class="my-3">
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">
                            No Telp
                        </label>
                        <input type="text" id="no_telp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="no_telp" value="{{ $u->no_telp }}">
                    </div>
                    <div class="my-3">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">
                            Alamat
                        </label>
                        <input type="text" id="alamat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="alamat" value="{{ $u->alamat }}">
                    </div>
                    <button type="submit"
                        class="px-3 py-2 mt-4 text-sm font-medium text-center text-white float-right bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Submit</button>
                </form>
            @endforeach
        </div>
    </div>
</x-app-layout>
