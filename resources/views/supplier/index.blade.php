<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight uppercase">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('supplier.create') }}"
                class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium px-2.5 py-2 mb-5 rounded border border-blue-400 inline-flex items-center justify-center">Add
                New Supplier</a>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b-2">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                no.telp
                            </th>
                            @if (Auth::user()->role === '1')
                                <th scope="col" class="px-6 py-3">
                                    action
                                </th>
                            @else
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $l)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $l->nama_supplier }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $l->alamat }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $l->no_telp }}
                                </td>
                                @if (Auth::user()->role === '1')
                                    <td class="px-6 py-4 inline-flex items-center justify-center">
                                        <a href="{{ route('supplier.edit', $l->id) }}"
                                            class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded border-blue-400 inline-flex items-center justify-center">Edit</a>
                                        <form action="{{ route('supplier.destroy', $l->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-100 hover:bg-red-200 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded border-red-400">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                @else
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
