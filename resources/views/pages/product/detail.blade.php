@extends('layouts.app')
@section("content")

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-violet-800">

    <x-navbar />

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        
        <!-- Back Button -->
        <div class="mb-8 mt-12">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm border border-white/20 text-white px-6 py-3 rounded-2xl hover:bg-white/20 transition-all duration-300 group">
                <i class="bi bi-arrow-left text-lg group-hover:-translate-x-1 transition-transform"></i>
                <span class="font-medium">Back to Products</span>
            </a>
        </div>

        <!-- Main Product Section -->
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

                <!-- Product Images -->
                <div class="space-y-6">
                    @if (session()->has('message'))
                        <div class="p-3 rounded-md bg-green-200">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- Main Image -->
                    <div class="relative group">
                        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-violet-50 to-white p-2">
                            <img src="{{ asset('storage/'.$product['image']['path']) }}"
                                 alt="{{ $product['name'] }}"
                                 class="w-full h-[500px] object-cover rounded-2xl group-hover:scale-[1.02] transition-transform duration-700">
                            
                            <!-- Image Badges -->
                            <div class="absolute top-6 left-6 space-y-3">
                                @if($product->is_new)
                                <span class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-rose-500 text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                                    <i class="bi bi-star-fill"></i>
                                    NEW ARRIVAL
                                </span>
                                @endif
                                
                                @if($product->discount)
                                <span class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm font-bold px-4 py-2 rounded-full shadow-lg">
                                    <i class="bi bi-tag-fill"></i>
                                    -{{ $product->discount }}% OFF
                                </span>
                                @endif
                            </div>

                            <!-- Size Badge -->
                            <div class="absolute bottom-6 right-6">
                                <div class="flex items-center gap-2 bg-black/60 backdrop-blur-sm text-white px-4 py-2 rounded-full">
                                    <i class="bi bi-rulers"></i>
                                    <span class="font-semibold">Size {{ $product['size'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Product Information -->
                <div class="text-white space-y-8">
                    <!-- Breadcrumb & Category -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-violet-300 text-sm">
                            <a href="{{ route('products.index') }}" class="hover:text-white transition">Products</a>
                            <i class="bi bi-chevron-right text-xs"></i>
                            <span>{{ $product->category->name ?? 'Fashion' }}</span>
                        </div>
                        
                        <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                            {{ $product['name'] }}
                        </h1>
                    </div>

                    <!-- Price Section -->
                    <div class="space-y-2">
                        @if($product->discount)
                        <div class="flex items-center gap-4">
                            <span class="text-4xl font-bold">
                                Rp {{ number_format($product['price'] * (1 - $product->discount/100), 0, ',', '.') }}
                            </span>
                            <span class="text-2xl text-gray-400 line-through">
                                Rp {{ number_format($product['price'], 0, ',', '.') }}
                            </span>
                            <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                                Save {{ $product->discount }}%
                            </span>
                        </div>
                        @else
                        <span class="text-4xl font-bold">
                            Rp {{ number_format($product['price'], 0, ',', '.') }}
                        </span>
                        @endif
                        
                        <p class="text-violet-300 text-sm">
                            <i class="bi bi-truck"></i>
                            Free shipping on orders over Rp 500.000
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold flex items-center gap-2">
                            <i class="bi bi-card-text"></i>
                            Product Description
                        </h3>
                        <div class="text-violet-100 leading-relaxed whitespace-pre-line space-y-4">
                            {{ $product['description'] }}
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 bg-white/5 backdrop-blur-sm p-4 rounded-2xl">
                            <div class="bg-violet-500/20 p-2 rounded-lg">
                                <i class="bi bi-shield-check text-violet-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-medium">Quality Guarantee</p>
                                <p class="text-sm text-violet-300">30-day return policy</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 bg-white/5 backdrop-blur-sm p-4 rounded-2xl">
                            <div class="bg-violet-500/20 p-2 rounded-lg">
                                <i class="bi bi-truck text-violet-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="font-medium">Fast Delivery</p>
                                <p class="text-sm text-violet-300">2-3 business days</p>
                            </div>
                        </div>
                    </div>

                    <!-- Size Selector -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold flex items-center gap-2">
                                <i class="bi bi-rulers"></i>
                                Select Size
                            </h3>
                            <a href="#" class="text-sm text-violet-300 hover:text-white flex items-center gap-1">
                                <i class="bi bi-ruler"></i>
                                Size Guide
                            </a>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['S', 'M', 'L', 'XL', 'XXL'] as $size)
                            <button class="px-6 py-3 rounded-xl border-2 {{ $product['size'] == $size ? 'border-violet-400 bg-violet-400/10 text-white' : 'border-white/20 text-violet-300 hover:border-violet-400 hover:bg-violet-400/5' }} transition-all">
                                {{ $size }}
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4 pt-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <!-- WhatsApp Order -->
                            <a href="https://wa.me/62XXXXXXXXXX?text={{ urlencode('Halo, saya ingin pesan '.$product['name'] . ' (Size: ' . $product['size'] . ')') }}"
                               target="_blank"
                               class="flex-1 group relative bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden">
                               <div class="relative z-10 flex items-center justify-center gap-3">
                                   <i class="bi bi-whatsapp text-xl"></i>
                                   <span>Order via WhatsApp</span>
                               </div>
                               <div class="absolute inset-0 bg-white/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                            </a>

                            <!-- Add to Cart -->
                            <form action="{{ route("user.keranjang.create") }}" method="POST">
                                @csrf
                                <button name="product_id" value="{{ $product['id'] }}" class="flex-1 group relative bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-700 hover:to-purple-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden">
                                    <div class="relative z-10 flex items-center justify-center gap-3">
                                        <i class="bi bi-cart-plus text-xl"></i>
                                        <span>Add to Cart</span>
                                    </div>
                                    <div class="absolute inset-0 bg-white/10 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                                </button>
                            </form>
                        </div>

                        <!-- Quick Actions -->
                        <div class="flex justify-center gap-6 pt-4">
                            <button class="flex items-center gap-2 text-violet-300 hover:text-white transition-colors group">
                                <div class="bg-white/5 p-2 rounded-lg group-hover:bg-white/10">
                                    <i class="bi bi-heart text-lg"></i>
                                </div>
                                <span>Add to Wishlist</span>
                            </button>
                            
                            <button class="flex items-center gap-2 text-violet-300 hover:text-white transition-colors group">
                                <div class="bg-white/5 p-2 rounded-lg group-hover:bg-white/10">
                                    <i class="bi bi-share text-lg"></i>
                                </div>
                                <span>Share Product</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@push('styles')
<style>
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: rgba(139, 92, 246, 0.5);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(139, 92, 246, 0.7);
    }
    
    /* Image hover effect */
    .group img {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>
@endpush

@endsection