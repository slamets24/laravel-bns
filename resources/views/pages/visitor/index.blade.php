@extends('layouts.visitor')

@section('title', 'Beranda')

@section('content')
    {{-- Hero Section --}}
    <x-partials.visitor.hero />

    {{-- Produk Terpopuler --}}
    <section class="w-full py-10 sm:py-12 lg:py-14 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6">
            @if ($favoritProducts->isEmpty())
                <h2 class="text-3xl font-bold tracking-tight text-center mb-8">Produk Tidak Ada</h2>
            @else
                <h2 class="text-3xl font-bold tracking-tight text-center mb-8">Produk Terpopuler</h2>
                <div class="grid gap-6 grid-cols-2 sm:grid-cols-3 lg:grid-cols-{{ min(count($favoritProducts), 4) }}">
                    @foreach ($favoritProducts as $favoritProduct)
                        <x-partials.visitor.card-best-product :favoritProduct="$favoritProduct" />
                    @endforeach
                </div>
                <div class="mt-8 text-center">
                    <a class="inline-flex h-10 items-center justify-center rounded-md bg-blue-600 px-8 text-sm font-medium text-white shadow transition-colors hover:bg-blue-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600"
                        href="{{ Route('product') }}" rel="ugc">
                        Lihat Selengkapnya
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Tentang Kami --}}
    <section class="w-full py-10 sm:py-12 lg:py-14 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl xl:text-5xl mb-6">Tentang Kami</h2>
            <div class="flex flex-col lg:flex-row space-y-6 lg:space-y-0 lg:space-x-8 mb-12">
                <div class="lg:w-2/3 space-y-6">
                    <p class="text-gray-600 md:text-lg leading-relaxed">
                        Selamat datang di toko online kami yang menghadirkan koleksi busana muslimah terkini.
                        Kami memahami pentingnya tampil elegan dan tetap sesuai syariat, sehingga kami menyediakan
                        beragam pilihan busana yang tidak hanya stylish tetapi juga nyaman dan berkualitas tinggi.
                    </p>
                    <p class="text-gray-600 md:text-lg leading-relaxed">
                        Didirikan oleh sekelompok individu yang berdedikasi untuk menghadirkan pilihan terbaik bagi
                        wanita muslimah, kami selalu berusaha memberikan produk yang memenuhi kebutuhan dan selera
                        Anda.
                    </p>
                    <p class="text-gray-600 md:text-lg leading-relaxed">
                        Terima kasih telah mempercayakan kami sebagai pilihan utama Anda dalam mencari busana
                        muslimah. Kami berkomitmen untuk terus berinovasi dan menghadirkan produk-produk terbaik
                        bagi Anda.
                    </p>
                </div>
                <div class="lg:w-1/3">
                    <img src="img/1.jpg" alt="Tentang Kami" class="w-full h-auto object-cover rounded-lg" />
                </div>
            </div>
        </div>
    </section>

    {{-- Semua Produk --}}
    <section class="w-full py-8 sm:py-10 lg:py-12 bg-gray-100">
        <div class="container mx-auto px-4 md:px-6">
            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-center mb-6 sm:mb-8">Semua Produk</h2>

            <div id="product-container"
                class="grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <x-partials.visitor.card-product :product="$product" />
                @endforeach
            </div>

            <div class="pagination mt-6 sm:mt-8">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
