@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gray-100">
<x-sidebar />

<main class="ml-64 p-6 max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

    <form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-8 rounded-2xl shadow space-y-5">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $product->name }}" class="w-full border px-4 py-3 rounded-xl">
        <input name="price" value="{{ $product->price }}" type="number" class="w-full border px-4 py-3 rounded-xl">
        <input name="size" value="{{ $product->size }}" class="w-full border px-4 py-3 rounded-xl">
        <textarea name="description" class="w-full border px-4 py-3 rounded-xl">{{ $product->description }}</textarea>

        <img src="{{ asset("storage/" . $product->image->path) }}" class="h-24 rounded-xl">

        <input name="image" type="file" class="w-full border px-4 py-3 rounded-xl">

        <button class="bg-[#726fbe] hover:bg-[#5f5bb0] text-white py-3 w-full rounded-xl">
            Update Product
        </button>
    </form>

</main>
</div>
@endsection
