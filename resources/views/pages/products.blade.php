@extends('layouts.app')
@section("content")

<div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-[#2f2e41] via-[#3a395a] to-[#726fbe]">

    <x-navbar />

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-28">

        <!-- Title -->
        <div class="mb-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">
                Products
            </h1>
            <p class="text-indigo-200">
                Pilih produk terbaik untuk gaya kamu hari ini
            </p>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

            @foreach($data as $item)
            <div class="group relative">

                <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition">

                    <!-- Image -->
                    <div class="relative overflow-hidden">
                        <img src="{{ $item['image'] }}"
                             class="h-72 w-full object-cover group-hover:scale-110 transition duration-500">

                        <span class="absolute top-4 left-4 bg-[#726fbe] text-white text-xs px-4 py-1 rounded-full shadow">
                            Size {{ $item['size'] }}
                        </span>
                    </div>

                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <h3 class="font-semibold text-lg text-[#2f2e41]">
                            {{ $item['name'] }}
                        </h3>

                        <p class="text-sm text-[#7a7896] line-clamp-2">
                            {{ $item['description'] }}
                        </p>

                        <div class="flex items-center justify-between pt-4">
                            <span class="font-bold text-xl text-[#726fbe]">
                                Rp {{ number_format($item['price'],0,',','.') }}
                            </span>

                            <a href="#"
                               class="bg-[#726fbe] hover:bg-[#5f5bb0] text-white px-5 py-2 rounded-xl text-sm shadow-md">
                                Detail
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection
