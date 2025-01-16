<footer class="w-full bg-gray-800 py-6">
    <div class="flex flex-col items-center px-3 py-5 md:flex-row">
        {{-- sisi kiri --}}
        <div class="mx-auto text-center lg:w-1/2 md:mx-0">
            <a class="flex items-center justify-center font-medium text-gray-900 title-font">
                <img class="w-16 md:w-20" src="{{ asset('img/logo2.jpg') }}" alt="">
            </a>
            <p class="mt-2 text-sm text-white">BNS Hijab Official Store</p>
            <div class="mt-4">
                <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                    <a href="https://www.tokopedia.com/sampurnasnackofficial?source=universe&st=product"
                        class="ml-2 md:ml-3 text-white cursor-pointer hover:text-green-new">
                        <img fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="w-4 h-4 md:w-5 md:h-5" src="{{ asset('img/tokoped.png') }}" alt="">
                    </a>
                    <a href="https://www.instagram.com/bns_hijab/"
                        class="ml-2 md:ml-3 text-white cursor-pointer hover:text-green-new">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 md:w-5 md:h-5" viewBox="0 0 24 24">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                            </rect>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
        {{-- akhir sisi kiri --}}
        {{-- sisi kanan --}}
        <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:text-right md:pl-20 md:mt-0">
            <div class="w-full px-4 md:w-1/2">
                <nav class="mb-10 list-none text-sm md:text-md">
                    <li class="mt-2 md:mt-3">
                        <a href="" class="text-white cursor-pointer hover:text-green-new">Home</a>
                    </li>
                    <li class="mt-2 md:mt-3">
                        <a href="" class="text-white cursor-pointer hover:text-green-new">Toko</a>
                    </li>
                    <li class="mt-2 md:mt-3">
                        <a href="" class="text-white cursor-pointer hover:text-green-new">Tentang Kami</a>
                    </li>
                </nav>
            </div>
        </div>
        {{-- akhir sisi kanan --}}
    </div>
    <div class="container mx-auto px-4 md:px-6 text-center text-white">
        <p class="text-xs md:text-sm">&copy; {{ date('Y') }} BNS. Created by Kulazutto.</p>
    </div>
</footer>
