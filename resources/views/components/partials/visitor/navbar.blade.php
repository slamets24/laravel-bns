<header class="px-4 lg:px-6 h-14 flex items-center bg-gray-100 fixed top-0 w-full z-50">
    <a class="flex items-center justify-center" href="#" rel="ugc">
        <img src="{{ asset('img/logo2.jpg') }}" class="h-6 w-6" alt="Acme Clothing">
        <span class="sr-only">Acme Clothing</span>
    </a>
    <nav class="ml-auto flex gap-4 sm:gap-6">
        <a class="text-sm font-medium hover:underline underline-offset-4" href="/" rel="ugc">
            Home
        </a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="{{ Route('product') }}" rel="ugc">
            Toko
        </a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="/about.html" rel="ugc">
            Tentang Kami
        </a>
    </nav>
</header>
