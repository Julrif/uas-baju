@extends('layouts.app')
@section("content")

<div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-[#2f2e41] via-[#3a395a] to-[#726fbe]">

    <x-navbar />

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-28 text-white">

        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center mb-20">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Tentang Toko Kami
            </h1>
            <p class="text-indigo-200">
                Lebih dari sekadar toko baju — kami menghadirkan gaya, kualitas, dan kepercayaan.
            </p>
        </div>

        <!-- Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-6xl mx-auto">

            <!-- Text -->
            <div class="space-y-5 leading-relaxed text-indigo-100">
                <p>
                    Toko kami berdiri dengan satu tujuan sederhana: menyediakan pakaian berkualitas tinggi
                    dengan desain modern yang dapat dipakai oleh siapa saja.
                </p>

                <p>
                    Setiap produk kami dipilih dengan bahan terbaik, proses produksi yang teliti,
                    dan model yang selalu mengikuti tren terkini.
                </p>

                <p>
                    Kami percaya bahwa berpakaian dengan baik adalah bentuk ekspresi diri dan
                    rasa percaya diri.
                </p>
            </div>

            <!-- Brand Values -->
            <div class="bg-white/10 backdrop-blur rounded-3xl p-8 shadow-xl space-y-4">
                <h3 class="text-2xl font-semibold mb-4 text-white">Kenapa Memilih Kami?</h3>

                <ul class="space-y-3 text-indigo-100">
                    <li>✔ Bahan premium & nyaman</li>
                    <li>✔ Model selalu update</li>
                    <li>✔ Harga jujur & terjangkau</li>
                    <li>✔ Pengiriman cepat & aman</li>
                    <li>✔ Support ramah & responsif</li>
                </ul>
            </div>

        </div>

    </div>
</div>

@endsection
