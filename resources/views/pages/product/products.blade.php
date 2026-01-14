@extends('layouts.app')
@section("content")

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-violet-800">

    <x-navbar />

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-28">

        <!-- Header Section -->
        <div class="mb-16 text-center">
            
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 leading-tight">
                Temukan <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-400 to-pink-400">Gaya</span> Anda
            </h1>
            
            <p class="text-lg text-violet-200 max-w-2xl mx-auto mb-8">
                Eksplorasi koleksi eksklusif kami yang dirancang untuk menampilkan kepribadian Anda
            </p>

        </div>

        <!-- Product Grid dengan Layout Responsif -->
        <div id="product-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @include('pages.product.partials.product-items', ['products' => $data])
        </div>

        <!-- Pagination atau Load More -->
        @if($data->hasMorePages())
            <div class="mt-16 text-center" id="load-more-container">
                <div class="inline-flex flex-col items-center space-y-4">
                    <button id="load-more-btn" 
                            data-next-page="{{ $data->nextPageUrl() }}"
                            data-current-page="{{ $data->currentPage() }}"
                            data-last-page="{{ $data->lastPage() }}"
                            class="group relative px-8 py-3 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 border border-white/20 shadow-lg hover:shadow-xl overflow-hidden">
                        
                        <div class="relative z-10 flex items-center justify-center gap-3">
                            <i class="bi bi-plus-circle text-lg"></i>
                            <span id="load-more-text">Load More Products</span>
                        </div>
                        
                        <!-- Loading Spinner (hidden by default) -->
                        <div id="loading-spinner" class="hidden absolute inset-0 flex items-center justify-center">
                            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-white"></div>
                        </div>
                        
                        <div class="absolute inset-0 bg-white/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                    </button>
                    
                    <!-- Progress Text -->
                    <div class="text-center">
                        <span class="text-violet-300 text-sm">
                            Showing 
                            <span id="shown-count">{{ $data->count() }}</span> 
                            of 
                            <span id="total-count">{{ $data->total() }}</span> 
                            products
                        </span>
                        <div class="w-48 h-1.5 bg-white/10 rounded-full overflow-hidden mt-2 mx-auto">
                            <div id="progress-bar" 
                                class="h-full bg-gradient-to-r from-violet-500 to-purple-500 transition-all duration-500"
                                style="width: {{ ($data->count() / $data->total() * 100) }}%">
                            </div>
                        </div>
                        <p class="text-violet-400 text-xs mt-2">
                            Page <span id="current-page">{{ $data->currentPage() }}</span> 
                            of <span id="total-pages">{{ $data->lastPage() }}</span>
                        </p>
                    </div>
                    
                    <!-- End of Products Message (hidden by default) -->
                    <div id="end-message" class="hidden text-center">
                        <div class="inline-flex items-center gap-3 text-emerald-400 bg-emerald-400/10 px-6 py-3 rounded-xl">
                            <i class="bi bi-check-circle-fill text-lg"></i>
                            <span class="font-medium">You've reached the end of our collection!</span>
                        </div>
                        <p class="text-violet-300 text-sm mt-3">
                            Can't find what you're looking for? 
                            <a href="#" class="text-white hover:text-violet-300 transition-colors">
                                Contact our support team
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @elseif($data->count() > 0)
            <div class="mt-16 text-center">
                <div class="inline-flex items-center gap-3 text-violet-400 bg-violet-400/10 px-6 py-3 rounded-xl">
                    <i class="bi bi-info-circle-fill"></i>
                    <span class="font-medium">All {{ $data->total() }} products are displayed</span>
                </div>
            </div>
        @endif

        <!-- Features Section -->
        <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-violet-500/20 rounded-lg mb-4">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Quality Guarantee</h3>
                <p class="text-violet-200 text-sm">30-day money back guarantee</p>
            </div>
            
            <div class="text-center p-6 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-violet-500/20 rounded-lg mb-4">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">Fast Delivery</h3>
                <p class="text-violet-200 text-sm">Free shipping over $100</p>
            </div>
            
            <div class="text-center p-6 bg-white/5 rounded-2xl backdrop-blur-sm border border-white/10">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-violet-500/20 rounded-lg mb-4">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-white font-semibold mb-2">24/7 Support</h3>
                <p class="text-violet-200 text-sm">Dedicated customer service</p>
            </div>
        </div>

    </div>

</div>

{{-- Style --}}
@push('styles')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        /* Staggered animation for items */
        .grid > *:nth-child(1) { animation-delay: 0.1s; }
        .grid > *:nth-child(2) { animation-delay: 0.2s; }
        .grid > *:nth-child(3) { animation-delay: 0.3s; }
        .grid > *:nth-child(4) { animation-delay: 0.4s; }
        .grid > *:nth-child(5) { animation-delay: 0.5s; }
        .grid > *:nth-child(6) { animation-delay: 0.6s; }
    </style>
@endpush

{{-- Script --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadMoreBtn = document.getElementById('load-more-btn');
            const productContainer = document.getElementById('product-container');
            const loadingSpinner = document.getElementById('loading-spinner');
            const loadMoreText = document.getElementById('load-more-text');
            const shownCount = document.getElementById('shown-count');
            const progressBar = document.getElementById('progress-bar');
            const currentPage = document.getElementById('current-page');
            const endMessage = document.getElementById('end-message');
            const loadMoreContainer = document.getElementById('load-more-container');
            const totalCount = document.getElementById('total-count');
            
            if (!loadMoreBtn) return;
            
            let isLoading = false;
            
            loadMoreBtn.addEventListener('click', async function() {
                if (isLoading) return;
                
                const nextPageUrl = this.dataset.nextPage;
                if (!nextPageUrl) return;
                
                // Show loading state
                isLoading = true;
                loadingSpinner.classList.remove('hidden');
                loadMoreText.classList.add('hidden');
                loadMoreBtn.disabled = true;
                
                try {
                    const response = await fetch(nextPageUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    if (!response.ok) throw new Error('Network response was not ok');
                    
                    const html = await response.text();
                    
                    // Parse the HTML response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    // Extract new products and update data
                    const newProducts = doc.getElementById('product-container').innerHTML;
                    const newLoadMoreBtn = doc.getElementById('load-more-btn');
                    
                    // Append new products with fade-in animation
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = newProducts;
                    const productElements = tempDiv.children;
                    
                    // Add delay for staggered animation
                    Array.from(productElements).forEach((element, index) => {
                        element.style.animationDelay = `${index * 0.1}s`;
                        productContainer.appendChild(element.cloneNode(true));
                    });
                    
                    // Update pagination data
                    if (newLoadMoreBtn) {
                        loadMoreBtn.dataset.nextPage = newLoadMoreBtn.dataset.nextPage;
                        loadMoreBtn.dataset.currentPage = newLoadMoreBtn.dataset.currentPage;
                        
                        // Update current page number
                        currentPage.textContent = parseInt(newLoadMoreBtn.dataset.currentPage) + 1;
                    } else {
                        // No more pages, show end message
                        loadMoreContainer.classList.add('hidden');
                        endMessage.classList.remove('hidden');
                    }
                    
                    // Update counts
                    const currentShown = parseInt(shownCount.textContent);
                    const newProductsCount = productElements.length;
                    const totalProducts = parseInt(totalCount.textContent);
                    
                    shownCount.textContent = currentShown + newProductsCount;
                    
                    // Update progress bar
                    const progressPercentage = ((currentShown + newProductsCount) / totalProducts) * 100;
                    progressBar.style.width = `${Math.min(progressPercentage, 100)}%`;
                    
                } catch (error) {
                    console.error('Error loading more products:', error);
                    
                    // Show error message
                    loadMoreText.innerHTML = '<i class="bi bi-exclamation-triangle mr-2"></i>Error Loading';
                    loadMoreText.classList.remove('hidden');
                    
                    // Reset button after 3 seconds
                    setTimeout(() => {
                        loadMoreText.innerHTML = 'Load More Products';
                        resetButton();
                    }, 3000);
                    return;
                    
                } finally {
                    resetButton();
                }
                
                function resetButton() {
                    isLoading = false;
                    loadingSpinner.classList.add('hidden');
                    loadMoreText.classList.remove('hidden');
                    loadMoreBtn.disabled = false;
                }
            });
            
            // Infinite scroll (optional)
            let observer;
            if (IntersectionObserver) {
                observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && !isLoading) {
                        loadMoreBtn.click();
                    }
                }, {
                    rootMargin: '100px',
                    threshold: 0.1
                });
                
                observer.observe(loadMoreBtn);
            }
            
            // Keyboard shortcut (Spacebar to load more)
            document.addEventListener('keydown', (e) => {
                if (e.code === 'Space' && !isLoading && 
                    document.activeElement !== document.body && 
                    !document.activeElement.matches('input, textarea, button, a')) {
                    e.preventDefault();
                    loadMoreBtn.click();
                }
            });
        });

        // Animation for new items
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '50px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all product cards
        document.querySelectorAll('#product-container > div').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
@endpush

@endsection