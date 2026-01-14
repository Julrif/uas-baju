@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gray-50">
    <x-sidebar />

    <main class="ml-64 p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Product</h1>
                <p class="text-gray-600 mt-2">Update product information and details</p>
            </div>
            <a href="{{ route('admin.products.index') }}" 
               class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="bi bi-arrow-left"></i>
                Back to Products
            </a>
        </div>

        <!-- Main Content Card -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <!-- Card Header -->
                <div class="px-8 py-6 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-indigo-50 rounded-lg">
                            <i class="bi bi-box-seam text-indigo-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Product Information</h2>
                            <p class="text-gray-500 text-sm">Edit product details and specifications</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <form action="{{ route('admin.products.update', $product->id) }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div class="space-y-2">
                        <label for="name" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                            <i class="bi bi-tag text-gray-500"></i>
                            Product Name
                        </label>
                        <input id="name" 
                               name="name" 
                               value="{{ $product->name }}" 
                               required
                               class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price and Size Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Price -->
                        <div class="space-y-2">
                            <label for="price" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                <i class="bi bi-currency-dollar text-gray-500"></i>
                                Price
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">RP</span>
                                <input id="price" 
                                       name="price" 
                                       value="{{ $product->price }}" 
                                       type="number" 
                                       step="0.01"
                                       min="0"
                                       required
                                       class="w-full border border-gray-300 pl-10 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">
                            </div>
                            @error('price')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Size -->
                        <div class="space-y-2">
                            <label for="size" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                <i class="bi bi-rulers text-gray-500"></i>
                                Size
                            </label>
                            <input id="size" 
                                   name="size" 
                                   value="{{ $product->size }}" 
                                   required
                                   class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                                   placeholder="e.g., S, M, L, XL">
                            @error('size')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-2">
                        <label for="description" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                            <i class="bi bi-card-text text-gray-500"></i>
                            Description
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">{{ $product->description }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Section -->
                    <div class="space-y-4 pt-4 border-t border-gray-200">
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                            <i class="bi bi-image text-gray-500"></i>
                            Product Image
                        </label>
                        
                        <!-- Current Image -->
                        <div class="flex items-start gap-6">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 mb-3">Current Image</p>
                                <div class="relative w-40 h-40 bg-gray-100 rounded-xl overflow-hidden border border-gray-300">
                                    @if($product->image && $product->image->path)
                                        <img src="{{ asset('storage/' . $product->image->path) }}" 
                                             alt="{{ $product->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <i class="bi bi-image text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- New Image Upload -->
                            <div class="flex-1">
                                <p class="text-sm text-gray-600 mb-3">Upload New Image</p>
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-indigo-400 transition-colors">
                                    <i class="bi bi-cloud-arrow-up text-3xl text-gray-400 mb-3"></i>
                                    <p class="text-sm text-gray-600 mb-2">Drag & drop or click to upload</p>
                                    <p class="text-xs text-gray-500 mb-4">PNG, JPG, WEBP up to 5MB</p>
                                    <input id="image" 
                                           name="image" 
                                           type="file" 
                                           accept="image/*"
                                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                </div>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.products.index') }}" 
                           class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="bi bi-check-circle"></i>
                            Update Product
                        </button>
                    </div>
                </form>
            </div>

            <!-- Additional Info Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start gap-3">
                    <i class="bi bi-info-circle text-blue-600 text-xl mt-0.5"></i>
                    <div>
                        <h3 class="font-medium text-blue-900 mb-1">Editing Tips</h3>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li class="flex items-start gap-2">
                                <i class="bi bi-dot text-blue-600"></i>
                                Ensure product details are accurate and up-to-date
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="bi bi-dot text-blue-600"></i>
                                Upload high-quality images for better presentation
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="bi bi-dot text-blue-600"></i>
                                Changes will be reflected immediately after saving
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('styles')
    <style>
    input:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .file\:bg-indigo-50 {
        background-color: #eef2ff;
    }
    
    .file\:text-indigo-700 {
        color: #4338ca;
    }
    
    .hover\:file\:bg-indigo-100:hover {
        background-color: #e0e7ff;
    }
</style>
@endpush
@endsection