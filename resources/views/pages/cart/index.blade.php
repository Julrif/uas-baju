@extends("layouts.app")
@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-violet-800">
    <x-navbar />

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8 mt-12">
            <div class="flex items-center gap-4">
                <a href="{{ route('products.index') }}" 
                   class="flex items-center gap-2 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="bi bi-arrow-left"></i>
                    Continue Shopping
                </a>
                <span class="text-sm text-gray-500">
                    <span id="cartCount">{{ $cartItems->count() }}</span> items
                </span>
            </div>
        </div>

        @if($cartItems->isEmpty())
            <!-- Empty Cart State -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                    <div class="w-24 h-24 mx-auto mb-6 flex items-center justify-center bg-gray-100 rounded-full">
                        <i class="bi bi-cart text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-3">Your cart is empty</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">
                        Looks like you haven't added any products to your cart yet. Start shopping to find amazing products!
                    </p>
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center gap-2 px-8 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        <i class="bi bi-bag"></i>
                        Start Shopping
                    </a>
                </div>
            </div>
        @else
            <!-- Cart Content -->
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Cart Items -->
                    <div class="lg:col-span-2 space-y-6">
                        @if (session()->has('message'))
                            <div class="p-3 rounded-md bg-green-200">
                                {{ session('message') }}
                            </div>
                        @endif
                        <!-- Cart Items List -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                                <div class="grid grid-cols-12 gap-4 text-sm font-medium text-gray-700">
                                    <div class="col-span-6">PRODUCT</div>
                                    <div class="col-span-6 text-end">PRICE</div>
                                </div>
                            </div>
                            <div class="divide-y divide-gray-200">
                                @foreach($cartItems as $item)
                                    <div class="p-6 hover:bg-gray-50 transition-colors cart-item" data-id="{{ $item->id }}">
                                        <div class="grid grid-cols-12 gap-4 items-center">
                                            <!-- Product Image & Name -->
                                            <div class="col-span-6">
                                                <div class="flex items-center gap-4">
                                                    <div class="relative">
                                                        <img src="{{ asset('storage/' . $item->product->image->path) }}" 
                                                             alt="{{ $item->product->name }}"
                                                             class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                                                        @if($item->quantity > 1)
                                                            <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
                                                                {{ $item->quantity }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h4 class="font-medium text-gray-800">{{ $item->product->name }}</h4>
                                                        <p class="text-sm text-gray-500 mt-1">{{ $item->product->size }}</p>
                                                        <form action="{{ route("user.keranjang.delete", $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button 
                                                                onclick="return confirm('Are you sure you want to submit this form?')"
                                                                class="text-red-500 cursor-pointer hover:text-red-700 text-sm mt-2 flex items-center gap-1">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </from>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="col-span-6 text-end">
                                                <span class="text-lg font-semibold text-gray-800">
                                                    Rp. {{ number_format($item->product->price, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- Right Column - Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sticky top-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Order Summary</h3>
                            
                            <div class="space-y-4">
                                <!-- Subtotal -->
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium" id="subtotal">Rp. {{ number_format($subtotal, 2) }}</span>
                                </div>
                                
                                <!-- Shipping -->
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Shipping</span>
                                    <span class="font-medium" id="shipping">
                                        @if($subtotal > 100)
                                            <span class="text-green-600">FREE</span>
                                        @else
                                            $10.00
                                        @endif
                                    </span>
                                </div>
                                
                                <!-- Divider -->
                                <div class="border-t border-gray-300 my-4"></div>
                                
                                <!-- Checkout Button -->
                                <a href="" 
                                   class="block w-full mt-6 px-6 py-4 bg-indigo-600 text-white text-center font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                                    <i class="bi bi-lock"></i>
                                    Proceed to Checkout
                                </a>
                                
                            </div>
                        </div>
                        
                        <!-- Help Card -->
                        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
                            <div class="flex items-start gap-3">
                                <i class="bi bi-info-circle text-blue-600 text-xl mt-0.5"></i>
                                <div>
                                    <h3 class="font-medium text-blue-900 mb-2">Need Help?</h3>
                                    <p class="text-sm text-blue-800 mb-3">
                                        Have questions about your order or need assistance?
                                    </p>
                                    {{-- <a href="{{ route('contact') }}" 
                                       class="inline-flex items-center gap-2 text-sm text-blue-700 hover:text-blue-900">
                                        <i class="bi bi-chat-left"></i>
                                        Contact Support
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>

@push("styles")
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        .cart-item {
            transition: all 0.2s ease;
        }
        
        .cart-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .quantity-input {
            -moz-appearance: textfield;
        }
    </style>
@endpush
@endsection