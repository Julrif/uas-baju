@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gray-50">
    <x-sidebar />

    <main class="ml-64 p-6">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Add New Product</h1>
                <p class="text-gray-600 mt-2">Create a new product for your store</p>
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
                            <i class="bi bi-plus-circle text-indigo-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Create New Product</h2>
                            <p class="text-gray-500 text-sm">Fill in the product details below</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <form action="{{ route('admin.products.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="p-8 space-y-6">
                    @csrf

                    <!-- Product Name -->
                    <div class="space-y-2">
                        <label for="name" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                            <i class="bi bi-tag text-gray-500"></i>
                            Product Name
                            <span class="text-red-500">*</span>
                        </label>
                        <input id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Enter product name"
                               required
                               class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder:text-gray-400">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Price and Size Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Price -->
                        <div class="space-y-2">
                            <label for="price" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                <i class="bi bi-currency-dollar text-gray-500"></i>
                                Price
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">RP</span>
                                <input id="price" 
                                       name="price" 
                                       value="{{ old('price') }}"
                                       type="number" 
                                       step="0.01"
                                       min="0"
                                       placeholder="0.00"
                                       required
                                       class="w-full border border-gray-300 pl-8 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder:text-gray-400">
                            </div>
                            @error('price')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Size -->
                        <div class="space-y-2">
                            <label for="size" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                <i class="bi bi-rulers text-gray-500"></i>
                                Size
                                <span class="text-red-500">*</span>
                            </label>
                            <input id="size" 
                                   name="size" 
                                   value="{{ old('size') }}"
                                   placeholder="e.g., S, M, L, XL or specific measurements"
                                   required
                                   class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder:text-gray-400">
                            @error('size')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
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
                                  placeholder="Describe your product features, specifications, and benefits..."
                                  class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder:text-gray-400">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <i class="bi bi-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Image Upload Section -->
                    <div class="space-y-4 pt-4">
                        <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                            <i class="bi bi-image text-gray-500"></i>
                            Product Image
                            <span class="text-red-500">*</span>
                        </label>
                        
                        <!-- Upload Area -->
                        <div class="space-y-4">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-indigo-400 transition-colors bg-gray-50">
                                <div class="max-w-md mx-auto">
                                    <div class="p-4 inline-flex items-center justify-center w-16 h-16 bg-indigo-50 rounded-full mb-4">
                                        <i class="bi bi-cloud-arrow-up text-2xl text-indigo-600"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-700 mb-2">Upload Product Image</h3>
                                    <p class="text-sm text-gray-600 mb-4">Drag and drop your image here, or click to browse</p>
                                    <p class="text-xs text-gray-500 mb-6">Supports: JPG, PNG, WEBP • Max: 5MB</p>
                                    
                                    <div class="relative">
                                        <input id="image" 
                                               name="image" 
                                               type="file" 
                                               accept="image/*"
                                               required
                                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                               onchange="previewImage(event)">
                                        <label for="image" 
                                               class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors cursor-pointer">
                                            <i class="bi bi-upload"></i>
                                            Choose File
                                        </label>
                                    </div>
                                    
                                    <p id="fileName" class="text-sm text-gray-500 mt-3 hidden">
                                        <i class="bi bi-file-earmark-image"></i>
                                        <span class="ml-1"></span>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Image Preview -->
                            <div id="imagePreview" class="hidden">
                                <p class="text-sm font-medium text-gray-700 mb-3">Preview:</p>
                                <div class="w-40 h-40 bg-gray-100 rounded-xl overflow-hidden border border-gray-300">
                                    <img id="preview" class="w-full h-full object-cover">
                                </div>
                            </div>
                            
                            @error('image')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200">
                        <button type="reset" 
                                class="flex items-center gap-2 px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            <i class="bi bi-arrow-clockwise"></i>
                            Reset Form
                        </button>
                        <button type="submit" 
                                class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="bi bi-check-circle"></i>
                            Save Product
                        </button>
                    </div>
                </form>
            </div>

            <!-- Help Card -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Required Fields Info -->
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-6">
                    <div class="flex items-start gap-3">
                        <i class="bi bi-exclamation-triangle text-amber-600 text-xl mt-0.5"></i>
                        <div>
                            <h3 class="font-medium text-amber-900 mb-2">Required Fields</h3>
                            <p class="text-sm text-amber-800 mb-3">Fields marked with <span class="text-red-500">*</span> are required.</p>
                            <ul class="text-sm text-amber-800 space-y-2">
                                <li class="flex items-center gap-2">
                                    <i class="bi bi-check-circle text-amber-600"></i>
                                    Product name must be unique
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="bi bi-check-circle text-amber-600"></i>
                                    Price must be a valid number
                                </li>
                                <li class="flex items-center gap-2">
                                    <i class="bi bi-check-circle text-amber-600"></i>
                                    Image must be in supported format
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                    <div class="flex items-start gap-3">
                        <i class="bi bi-lightbulb text-blue-600 text-xl mt-0.5"></i>
                        <div>
                            <h3 class="font-medium text-blue-900 mb-2">Tips for Better Products</h3>
                            <ul class="text-sm text-blue-800 space-y-2">
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-star text-blue-600 mt-0.5"></i>
                                    Use clear, descriptive product names
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-star text-blue-600 mt-0.5"></i>
                                    Upload high-quality product images
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-star text-blue-600 mt-0.5"></i>
                                    Include detailed size information
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="bi bi-star text-blue-600 mt-0.5"></i>
                                    Add compelling product descriptions
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Add Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<script>
    function previewImage(event) {
        const input = event.target;
        const fileNameElement = document.getElementById('fileName');
        const fileNameSpan = fileNameElement.querySelector('span');
        const previewContainer = document.getElementById('imagePreview');
        const preview = document.getElementById('preview');
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            
            // Show file name
            fileNameSpan.textContent = file.name;
            fileNameElement.classList.remove('hidden');
            
            // Preview image
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            
            reader.readAsDataURL(file);
        }
    }

    // Reset form preview when reset button is clicked
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const resetButton = form.querySelector('button[type="reset"]');
        const fileNameElement = document.getElementById('fileName');
        const previewContainer = document.getElementById('imagePreview');
        
        if (resetButton) {
            resetButton.addEventListener('click', function() {
                fileNameElement.classList.add('hidden');
                previewContainer.classList.add('hidden');
            });
        }
    });
</script>

@push("styles")
<style>
    input:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .border-dashed {
        border-style: dashed;
    }
    
    /* Custom file input styling */
    input[type="file"]::-webkit-file-upload-button {
        visibility: hidden;
    }
    
    input[type="file"]::before {
        content: none;
    }
</style>
@endpush
@endsection