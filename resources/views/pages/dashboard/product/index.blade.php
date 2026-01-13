@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gray-100">

    <x-sidebar />

    <main class="ml-64 p-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Manage Products</h2>
            <a href="{{ route('admin.products.create') }}"
               class="bg-[#726fbe] hover:bg-[#5f5bb0] text-white px-5 py-2 rounded-xl shadow">
                + Add Product
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            @if (session()->has('message'))
                <div class="p-3 rounded-md bg-blue-200">
                    {{ session('message') }}
                </div>
            @endif

            <table class="w-full text-sm">
                <thead class="bg-[#726fbe] text-white">
                    <tr>
                        <th class="p-4 text-left">Image</th>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Price</th>
                        <th class="p-4 text-left">Size</th>
                        <th class="p-4 text-left">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @foreach($products as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="p-4">
                            <img src="{{ asset("storage/" . $item->image->path) }}" class="h-12 w-12 rounded-lg object-cover">
                        </td>
                        <td class="p-4 font-semibold">{{ $item->name }}</td>
                        <td class="p-4 text-[#726fbe] font-bold">
                            Rp {{ number_format($item->price,0,',','.') }}
                        </td>
                        <td class="p-4">{{ $item->size }}</td>
                        <td class="p-4 h-full flex gap-2">
                            <div class="flex gap-2 items-center h-full w-full">
                                <a href="{{ route('admin.products.edit',$item->id) }}"
                                class="px-4 py-1 rounded-lg text-yellow-500">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
    
                                <form action="{{ route('admin.products.destroy',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="cursor-pointer px-4 py-1 text-red-500 rounded-lg">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </main>

</div>
@endsection
