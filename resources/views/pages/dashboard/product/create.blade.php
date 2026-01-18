
<!-- Main Content Card -->
<div class="max-w-4xl mx-auto max-h-[80vh] overflow-y-auto">
    <div class="bg-white overflow-hidden">

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
</div>

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