@extends("layouts.app")

@section('content')
<div class="h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-40 h-40 bg-purple-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-6xl w-full space-y-8 md:space-y-0 md:grid md:grid-cols-2 md:gap-16 items-center">
        <!-- Left Side - Branding & Info -->
        <div class="hidden md:block space-y-8">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-xl">{{ substr(env("APP_NAME"), 0, 1) }}</span>
                </div>
                <span class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                    {{ env("APP_NAME") }}
                </span>
            </div>

            <!-- Hero Text -->
            <div class="space-y-4">
                <h1 class="text-4xl font-bold text-gray-900 leading-tight">
                    Welcome Back to
                    <span class="bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                        Your Account
                    </span>
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Sign in to access your personalized dashboard, manage your orders, and discover exclusive offers.
                </p>
            </div>

            <!-- Features -->
            <div class="space-y-4 pt-8">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="text-gray-700">Secure & encrypted login</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-700">Access your order history</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-700">Personalized recommendations</span>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <form action="{{ route('login.auth') }}" method="POST" class="relative">
            @csrf
            <!-- Form Container -->
            <div class="relative bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                <!-- Decorative Top Bar -->
                <div class="h-2 bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500"></div>
                
                <div class="p-8 sm:p-10">
                    <!-- Mobile Logo -->
                    <div class="flex justify-center md:hidden mb-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center">
                                <span class="text-white font-bold">{{ substr(env("APP_NAME"), 0, 1) }}</span>
                            </div>
                            <span class="text-2xl font-bold text-gray-900">{{ env("APP_NAME") }}</span>
                        </div>
                    </div>

                    <!-- Header -->
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold text-gray-900">Sign In</h2>
                        <p class="mt-2 text-gray-600">Enter your credentials to continue</p>
                    </div>

                    <!-- Login Form -->
                    <div class="space-y-6" action="#" method="POST">
                        @if (session()->has('error'))
                            <div class="p-3 rounded-md bg-red-200">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="flex flex-col gap-5">
                            <!-- Email Input -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Email Address
                                    <span class="text-red-500">*</span>
                                </label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input name="email" type="email" required class="block w-full pl-10 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 placeholder-gray-400" placeholder="you@example.com">
                                </div>
                            </div>
    
                            <!-- Password Input -->
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Password
                                        <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input name="password" type="password" required class="block w-full pl-10 pr-12 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 placeholder-gray-400" placeholder="••••••••">
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
    
                            <!-- Submit Button -->
                            <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl text-white font-medium bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Decorative Bottom Elements -->
            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl -z-10"></div>
            <div class="absolute -top-6 -right-6 w-32 h-32 bg-cyan-500/10 rounded-full blur-2xl -z-10"></div>
        </form>
    </div>
</div>

<!-- Toggle Password Visibility Script -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordToggle = document.querySelector('button[type="button"]');
        const passwordInput = document.querySelector('input[type="password"]');
        
        if (passwordToggle) {
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Change icon
                const icon = this.querySelector('svg');
                if (type === 'text') {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    `;
                } else {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    `;
                }
            });
        }
    });
</script>

<style>
    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .floating-element {
        animation: float 6s ease-in-out infinite;
    }
    
    /* Smooth transitions */
    input, button {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Focus styles */
    input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
@endpush
@endsection