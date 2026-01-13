@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gray-100">
<x-sidebar />

<main class="ml-64 p-6 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Add Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-8 rounded-2xl shadow space-y-5">
        @csrf

        <input name="name" placeholder="Product Name" class="w-full border px-4 py-3 rounded-xl">
        <input name="price" placeholder="Price" type="number" class="w-full border px-4 py-3 rounded-xl">
        <input name="size" placeholder="Size" class="w-full border px-4 py-3 rounded-xl">
        <input name="image" type="file" class="w-full border px-4 py-3 rounded-xl">
        <textarea name="description" placeholder="Description" class="w-full border px-4 py-3 rounded-xl"></textarea>

        <button class="bg-[#726fbe] hover:bg-[#5f5bb0] text-white py-3 w-full rounded-xl">
            Save Product
        </button>
    </form>

</main>
</div>
@endsection
