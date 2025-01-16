@extends('layouts.visitor')

@section('title', 'Detail Produk')

@section('content')
    <section class="w-full py-8 sm:py-16 bg-gray-100">
        <div class="grid gap-4 px-4 mx-auto max-w-5xl md:grid-cols-2 md:gap-6 font-inter overflow-hidden">
            <!-- Gambar Produk -->
            <div>
                <img class="w-full h-auto rounded-lg aspect-square object-cover object-center" id="expandedImg"
                    src="{{ Storage::url($images->first()->name) }}" alt="{{ $detailProduct->name }}">
                <div class="flex gap-2 overflow-x-auto mt-4">
                    @foreach ($images as $image)
                        <img class="h-16 w-16 rounded-lg object-cover cursor-pointer" src="{{ Storage::url($image->name) }}"
                            alt="{{ $detailProduct->name }}" onclick="document.getElementById('expandedImg').src=this.src">
                    @endforeach
                </div>
            </div>

            <!-- Detail Produk -->
            <div class="space-y-4">
                <h1 class="text-xl font-bold md:text-2xl">{{ $detailProduct->name }}</h1>

                <!-- Warna -->
                <div>
                    <span class="block text-sm font-medium text-gray-700">Warna:</span>
                    <div class="flex gap-2 mt-2">
                        @foreach ($colors as $color)
                            <span
                                class="px-3 py-1 text-sm font-semibold text-white rounded-full shadow-sm {{ $color->name === 'Red' ? 'bg-red-500' : 'bg-blue-500' }}">
                                {{ $color->name }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Harga -->
                <div>
                    <span class="block text-sm font-medium text-gray-700">Harga:</span>
                    <h2 class="text-lg font-bold text-gray-800">{{ 'Rp. ' . number_format($detailProduct->price) }}</h2>
                </div>

                <!-- Deskripsi -->
                <div>
                    <span class="block text-sm font-medium text-gray-700">Deskripsi:</span>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed break-words">{!! $detailProduct->description !!}</p>
                </div>

                <!-- Tombol Pesan -->
                <div class="mt-6">
                    <!-- Flex container untuk tombol -->
                    <div class="flex flex-col sm:flex-row sm:gap-4 justify-center sm:justify-start">
                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/{{ $detailProduct->url_wa }}?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($detailProduct->name) }}."
                            class="flex items-center justify-center w-full sm:w-auto bg-green-500 px-4 py-2 rounded-md text-white text-sm font-medium shadow-md hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-500">
                            WhatsApp
                        </a>
                        <!-- Tombol Shopee -->
                        <a href="{{ $detailProduct->url_shopee }}"
                            class="flex items-center justify-center w-full sm:w-auto bg-orange-500 px-4 py-2 mt-2 sm:mt-0 rounded-md text-white text-sm font-medium shadow-md hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            Shopee
                        </a>
                        <!-- Tombol Tokopedia -->
                        <a href="{{ $detailProduct->url_tokped }}"
                            class="flex items-center justify-center w-full sm:w-auto bg-green-600 px-4 py-2 mt-2 sm:mt-0 rounded-md text-white text-sm font-medium shadow-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-600">
                            Tokopedia
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="w-full py-8 bg-gray-100">
        <div class="px-4 mx-auto max-w-5xl overflow-hidden">
            <h2 class="text-xl font-bold text-center mb-6">Produk Terpopuler</h2>
            <div class="grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($newsProducts as $newsProduct)
                    <x-partials.visitor.card-best-product :newsProduct="$newsProduct" />
                @endforeach
            </div>
            <div class="text-center mt-6">
                <a class="inline-block bg-blue-600 px-6 py-2 rounded-md text-white text-sm hover:bg-blue-500" href="#"
                    rel="ugc">
                    Lihat Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <div class="flex items-center gap-2 mt-6 px-4">
        <svg class="w-5 h-5 text-green-new" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
        </svg>
        <a href="{{ url()->previous() }}" class="text-sm text-green-new">Kembali</a>
    </div>

    <style>
        body {
            overflow-x: hidden;
            /* Mencegah scrolling horizontal */
        }

        img {
            max-width: 100%;
            /* Membatasi ukuran gambar */
            height: auto;
        }

        .grid {
            overflow-x: hidden;
            /* Mencegah grid melampaui batas layar */
        }

        @media (max-width: 640px) {
            h1.text-xl {
                font-size: 1.25rem;
            }

            h2.text-lg {
                font-size: 1rem;
            }

            p {
                font-size: 0.875rem;
            }

            .flex {
                flex-wrap: wrap;
            }
        }
    </style>
@endsection
