<div id="editModal" class="fixed inset-0 z-[9999] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeEditModal()"></div>

    <!-- Modal Container -->
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <!-- Modal Content -->
        <div class="relative bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 scale-95"
             onclick="event.stopPropagation()">
            
            <!-- Modal Header -->
            <div class="sticky top-0 z-10 bg-gradient-to-r from-indigo-50 to-white px-8 py-6 border-b border-indigo-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-white rounded-lg shadow-sm border border-indigo-100">
                            <i class="bi bi-pencil-square text-indigo-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
                            <p class="text-gray-600 text-sm mt-1">Update product information and details</p>
                        </div>
                    </div>
                    <button onclick="closeEditModal()" 
                            class="p-2 hover:bg-gray-100 rounded-lg transition-colors group">
                        <i class="bi bi-x-lg text-gray-500 group-hover:text-gray-700 text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body with Form -->
            <div class="overflow-y-auto max-h-[calc(100vh-200px)]">
                <form id="editForm" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_id">

                    <!-- Form Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Product Name -->
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <i class="bi bi-tag text-gray-500"></i>
                                    Product Name
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input id="edit_name" 
                                           name="name" 
                                           class="w-full border border-gray-300 px-4 py-3 pl-10 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                                           required>
                                    <i class="bi bi-box absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-xs text-gray-500">Enter the product display name</p>
                            </div>

                            <!-- Price -->
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <i class="bi bi-currency-dollar text-gray-500"></i>
                                    Price
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                                    <input id="edit_price" 
                                           name="price" 
                                           type="number" 
                                           step="0.01"
                                           min="0"
                                           class="w-full border border-gray-300 px-4 py-3 pl-10 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                                           required>
                                    <i class="bi bi-cash-stack absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-xs text-gray-500">Enter price in USD</p>
                            </div>

                            <!-- Size -->
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <i class="bi bi-rulers text-gray-500"></i>
                                    Size
                                </label>
                                <div class="relative">
                                    <input id="edit_size" 
                                           name="size" 
                                           class="w-full border border-gray-300 px-4 py-3 pl-10 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                                           placeholder="e.g., S, M, L, XL">
                                    <i class="bi bi-aspect-ratio absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-xs text-gray-500">Product dimensions or size category</p>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Description -->
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <i class="bi bi-card-text text-gray-500"></i>
                                    Description
                                </label>
                                <div class="relative">
                                    <textarea id="edit_description" 
                                              name="description" 
                                              rows="6"
                                              class="w-full border border-gray-300 px-4 py-3 pl-10 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none resize-none"
                                              placeholder="Describe product features and specifications..."></textarea>
                                    <i class="bi bi-text-paragraph absolute left-3 top-4 text-gray-400"></i>
                                </div>
                                <div class="flex justify-between text-xs">
                                    <span class="text-gray-500">Product description and details</span>
                                    <span id="charCount" class="text-gray-400">0/500</span>
                                </div>
                            </div>

                            <!-- Current Image Preview -->
                            <div id="currentImageContainer" class="space-y-2">
                                <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                    <i class="bi bi-image text-gray-500"></i>
                                    Current Image
                                </label>
                                <div class="relative group"
                                
                                >
                                    <div class="w-full h-40 bg-gray-100 rounded-xl overflow-hidden border-2 border-dashed border-gray-300">
                                        <img 
                                            id="currentImagePreview" 
                                             src="https://placehold.co/400" 
                                             alt="Current Product Image"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <span class="text-white text-sm bg-black/50 px-3 py-1 rounded-lg">Current Image</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 text-sm font-medium text-gray-700">
                                <i class="bi bi-cloud-arrow-up text-gray-500"></i>
                                Update Image (Optional)
                            </label>
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 hover:border-indigo-400 transition-colors bg-gray-50">
                                <div class="text-center">
                                    <i class="bi bi-cloud-arrow-up text-3xl text-gray-400 mb-3"></i>
                                    <p class="text-gray-600 mb-2">Drag & drop new image or click to browse</p>
                                    <p class="text-xs text-gray-500 mb-4">Supports: JPG, PNG, WEBP • Max: 5MB</p>
                                    
                                    <div class="relative">
                                        <input type="file" 
                                               name="image" 
                                               accept="image/*"
                                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                               onchange="previewNewImage(event)">
                                        <label class="inline-flex items-center gap-2 px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                                            <i class="bi bi-upload"></i>
                                            Choose New Image
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- New Image Preview -->
                            <div id="newImagePreviewContainer" class="hidden mt-4">
                                <p class="text-sm font-medium text-gray-700 mb-2">New Image Preview:</p>
                                <div class="flex items-center gap-4">
                                    <div class="w-32 h-32 bg-gray-100 rounded-lg overflow-hidden border border-gray-300">
                                        <img id="newImagePreview" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1">
                                        <p id="newImageName" class="text-sm text-gray-600 mb-2"></p>
                                        <button type="button" 
                                                onclick="removeNewImage()"
                                                class="inline-flex items-center gap-1 text-sm text-red-600 hover:text-red-700">
                                            <i class="bi bi-trash"></i>
                                            Remove New Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <i class="bi bi-info-circle"></i>
                            <span>All changes will be saved immediately</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <button type="button" 
                                    onclick="closeEditModal()" 
                                    class="flex items-center gap-2 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors">
                                <i class="bi bi-x-lg"></i>
                                Cancel
                            </button>
                            <button type="submit" 
                                    class="flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-xl hover:from-indigo-700 hover:to-indigo-800 transition-all shadow-lg hover:shadow-xl">
                                <i class="bi bi-check-circle"></i>
                                Update Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Loading Overlay -->
            <div id="editModalLoading" class="absolute inset-0 bg-white/80 hidden items-center justify-center">
                <div class="text-center">
                    <div class="w-12 h-12 border-4 border-indigo-600 border-t-transparent rounded-full animate-spin mx-auto mb-3"></div>
                    <p class="text-gray-600">Updating product...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Animation */
    #editModal:not(.hidden) .relative.bg-white {
        animation: modalSlideIn 0.3s ease-out forwards;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Scrollbar Styling */
    .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }

    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 3px;
    }

    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }

    /* Input Focus Effects */
    input:focus, textarea:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    /* Transition Effects */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>


@push("scripts")
    
<script>
// Character Counter for Description
const descriptionTextarea = document.getElementById('edit_description');
const charCount = document.getElementById('charCount');

if (descriptionTextarea && charCount) {
    descriptionTextarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = `${length}/500`;
        
        if (length > 500) {
            charCount.classList.add('text-red-500');
        } else {
            charCount.classList.remove('text-red-500');
        }
    });
}

// Image Preview Function
function previewNewImage(event) {
    const input = event.target;
    const previewContainer = document.getElementById('newImagePreviewContainer');
    const preview = document.getElementById('newImagePreview');
    const fileName = document.getElementById('newImageName');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const reader = new FileReader();
        
        // Update file name
        fileName.textContent = file.name;
        
        // Show preview
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        
        reader.readAsDataURL(file);
    }
}

// Remove New Image
function removeNewImage() {
    const fileInput = document.querySelector('input[name="image"]');
    const previewContainer = document.getElementById('newImagePreviewContainer');
    
    fileInput.value = '';
    previewContainer.classList.add('hidden');
}

// Form Submission with Loading State
const editForm = document.getElementById('editForm');
const loadingOverlay = document.getElementById('editModalLoading');

if (editForm) {
    editForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // For normal form submission, remove the loading overlay
        setTimeout(() => {
            this.submit();
        }, 1000);
    });
}


// Open Modal with Data (example function)
function openEditModal(product) {
    const modal = document.getElementById('editModal');
    const imagePreview = document.getElementById('currentImagePreview');
    imagePreview.src = @json(asset('/storage')) + `/${product.image.path}`;
    
    editForm.action = `/dashboard/product/update/${product.id}`;
    
    // Fill form fields
    document.getElementById('edit_id').value = product.id;
    document.getElementById('edit_name').value = product.name;
    document.getElementById('edit_price').value = product.price;
    document.getElementById('edit_size').value = product.size || '';
    document.getElementById('edit_description').value = product.description || '';
    
    // Update character count
    if (charCount) {
        charCount.textContent = `${product.description?.length || 0}/500`;
    }
    
    // Set current image preview
    const currentImage = document.getElementById('currentImagePreview');
    // if (product.image_url) {
    //     currentImage.src = product.image_url;
    //     document.getElementById('currentImageContainer').classList.remove('hidden');
    // } else {
    //     document.getElementById('currentImageContainer').classList.add('hidden');
    // }
    
    // Hide new image preview
    document.getElementById('newImagePreviewContainer').classList.add('hidden');
    
    // Clear file input
    document.querySelector('input[name="image"]').value = '';
    
    // Show modal with animation
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.style.opacity = '1';
    }, 10);
}

// Close Modal
function closeEditModal() {
    const modal = document.getElementById('editModal');
    const content = modal.querySelector('.relative.bg-white');
    
    // Add closing animation
    content.style.animation = 'modalSlideIn 0.3s ease-out reverse forwards';
    
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.style.opacity = '0';
        content.style.animation = '';
        loadingOverlay.classList.add('hidden');
    }, 200);
}

// Close modal on ESC key
document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('editModal');
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeEditModal();
    }
});
</script>
@endpush