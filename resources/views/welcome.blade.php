@extends('layouts.app')
@section("content")
<div class="relative min-h-screen flex items-center overflow-hidden">
    <x-navbar />

    <!-- Background dengan overlay dan efek paralaks -->
    <div class="absolute inset-0 -z-10">
        <div 
            class="absolute inset-0 bg-cover bg-center bg-fixed bg-no-repeat"
            style="background-image: url('{{ asset('images/hero-section-image.jpg') }}');"
        ></div>
        <!-- Overlay gradient untuk meningkatkan keterbacaan teks -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        <!-- Overlay pola halus -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0aDR2NGgtNHYtNHptLTQtNGg0djRoLTR2LTR6bTQgMGg0djRoLTR2LTR6bTQtNGg0djRoLTR2LTR6bTQgMGg0djRoLTR2LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-20"></div>
    </div>

    <!-- Konten utama -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-0">
        <div class="max-w-3xl">

            <!-- Judul utama -->
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-6 leading-tight">
                <span class="block">Halo Dunia!</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300 mt-2">
                    Temukan Produk Terbaik
                </span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-lg sm:text-xl text-white/90 mb-10 max-w-2xl leading-relaxed">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ipsa consectetur debitis, voluptates tempore porro doloremque eaque.
            </p>

            <!-- Tombol aksi -->
            <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                <button type="button" class="group relative px-8 py-4 rounded-xl text-white font-semibold text-lg overflow-hidden transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                    <!-- Background gradient dengan animasi -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500 group-hover:from-blue-700 group-hover:via-blue-600 group-hover:to-cyan-600 transition-all duration-300"></div>
                    <!-- Efek cahaya -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                    <!-- Teks tombol -->
                    <span class="relative flex items-center justify-center gap-2">
                        SHOP NOW
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </button>

                <!-- Tombol sekunder -->
                <button type="button" class="group px-8 py-4 rounded-xl text-white font-medium text-lg border-2 border-white/30 hover:border-white/60 backdrop-blur-sm transition-all duration-300 hover:bg-white/10">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Learn More
                    </span>
                </button>
            </div>

            <!-- Statistik atau fitur -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-6 max-w-xl">
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-2xl font-bold text-white mb-1">10K+</div>
                    <div class="text-sm text-white/70">Happy Customers</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10">
                    <div class="text-2xl font-bold text-white mb-1">500+</div>
                    <div class="text-sm text-white/70">Premium Products</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-white/5 backdrop-blur-sm border border-white/10 hidden md:block">
                    <div class="text-2xl font-bold text-white mb-1">24/7</div>
                    <div class="text-sm text-white/70">Customer Support</div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endSection