@extends("layouts.dashboard")
@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">

    <x-sidebar />

    <main class="ml-64 p-6">

        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Product Management</h1>
                    <p class="text-gray-600 mt-1">Manage your product catalog efficiently</p>
                </div>
                
                
                
                <div class="flex items-center gap-4">
                    <!-- Add Product Button -->
                    <a href="{{ route('admin.products.create') }}"
                       class="group flex items-center gap-2 bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white px-5 py-2.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <i class="bi bi-plus-circle text-lg"></i>
                        <span>Add Product</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200 mb-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative">
                        <i class="bi bi-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" 
                               placeholder="Search products..." 
                               class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-violet-500 focus:border-transparent transition">
                    </div>
                </div>

            </div>
        </div>

        <!-- Success Message -->
        @if (session()->has('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-white rounded-2xl shadow-lg flex items-center justify-between animate-fadeIn">
            <div class="flex items-center gap-3">
                <i class="bi bi-check-circle-fill text-xl"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="mb-6 p-4 bg-gradient-to-r from-rose-500 to-pink-500 text-white rounded-2xl shadow-lg flex items-center justify-between animate-fadeIn">
            <div class="flex items-center gap-3">
                <i class="bi bi-exclamation-triangle-fill text-xl"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-white/80 hover:text-white">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        @endif

        <!-- Products Table -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-violet-600 to-purple-600 text-white">
                        <tr>
                            <th class="p-4 text-left font-semibold">
                                <div class="flex items-center gap-2">
                                    <span>Product</span>
                                </div>
                            </th>
                            {{-- <th class="p-4 text-left font-semibold">Category</th> --}}
                            <th class="p-4 text-left font-semibold">Price</th>
                            <th class="p-4 text-left font-semibold">Last Updated</th>
                            <th class="p-4 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse($products as $item)
                        <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                            <!-- Product Info -->
                            <td class="p-4">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $item->image->path) }}" 
                                             class="h-14 w-14 rounded-xl object-cover shadow-sm border border-gray-200">
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $item->name }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- Category -->
                            {{-- <td class="p-4">
                                <span class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-3 py-1 rounded-lg text-sm">
                                    <i class="bi bi-tag"></i>
                                    {{ $item->category->name ?? 'Uncategorized' }}
                                </span>
                            </td> --}}

                            <!-- Price -->
                            <td class="p-4">
                                <div class="font-bold text-gray-900">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </div>
                                @if($item->discount)
                                <div class="text-sm text-emerald-600 font-medium mt-1">
                                    <i class="bi bi-arrow-down-right"></i>
                                    {{ $item->discount }}% OFF
                                </div>
                                @endif
                            </td>

                            <!-- Last Updated -->
                            <td class="p-4 text-sm text-gray-600">
                                {{ $item->updated_at->format('M d, Y') }}
                                <br>
                                <span class="text-gray-400">{{ $item->updated_at->format('H:i') }}</span>
                            </td>

                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <!-- View Button -->
                                    <a href="{{ route('product.detail', $item->id) }}" 
                                       target="_blank"
                                       class="p-2 text-gray-600 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition-colors"
                                       title="View Product">
                                        <i class="bi bi-eye text-lg"></i>
                                    </a>

                                    <!-- Edit Button -->
                                    <button
                                        type="button"
                                        class="p-2 text-gray-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors"
                                        title="Edit Product"
                                        onclick="openEditModal({{ $item }})">
                                        <i class="bi bi-pencil-square text-lg"></i>
                                    </button>


                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.products.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-600 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors"
                                                title="Delete Product">
                                            <i class="bi bi-trash text-lg"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center">
                                <div class="flex flex-col items-center justify-center py-12">
                                    <div class="bg-gray-100 p-6 rounded-2xl mb-4">
                                        <i class="bi bi-box text-4xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No Products Found</h3>
                                    <p class="text-gray-600 mb-6">Get started by adding your first product</p>
                                    <a href="{{ route('admin.products.create') }}"
                                       class="bg-gradient-to-r from-violet-600 to-purple-600 text-white px-6 py-3 rounded-xl shadow hover:shadow-lg transition">
                                        + Add First Product
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </main>

</div>

<!-- Edit Product Modal -->
@include("pages.dashboard.product.partials.editModal")


@push('scripts')
<script>
function confirmDelete(event) {
    if (!confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
        event.preventDefault();
        return false;
    }
    return true;
}

// Quick action menu toggle
document.querySelectorAll('[data-action-menu]').forEach(button => {
    button.addEventListener('click', (e) => {
        e.stopPropagation();
        const menu = button.nextElementSibling;
        menu.classList.toggle('hidden');
    });
});

// Close menu when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('[data-action-menu]')) {
        document.querySelectorAll('.action-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    }
});

// Search functionality (basic)
const searchInput = document.querySelector('input[placeholder="Search products..."]');
searchInput.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    document.querySelectorAll('tbody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

</script>
@endpush

@push("styles")
    
<style>
/* Custom animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.3s ease-out;
}

/* Custom scrollbar for table */
.overflow-x-auto::-webkit-scrollbar {
    height: 6px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #c4b5fd;
    border-radius: 10px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #a78bfa;
}

/* Hover effects for table rows */
tbody tr {
    transition: all 0.2s ease;
}

tbody tr:hover {
    transform: translateX(4px);
    box-shadow: -4px 0 0 0 #a78bfa;
}
</style>
@endpush
@endsection

