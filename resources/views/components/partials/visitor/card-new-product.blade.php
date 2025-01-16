<!-- Product 1 -->
<div class="flex flex-col items-start space-y-2">
    <img src="{{ isset($newsProduct->images[0]) ? Storage::url($newsProduct->images[0]->name) : 'https://picsum.photos/300/300?random=' . rand(1, 1000) }}"
        width="300" height="300" alt="{{ $newsProduct->name }}"
        class="mx-auto aspect-square overflow-hidden rounded-xl object-cover" />
    <div class="flex justify-between w-full">
        <div>
            <a href="{{ Route('detailProduct', [$newsProduct->slug]) }}">
                <h3 class="text-lg font-medium">{{ $newsProduct->name }}</h3>
            </a>
            <p class="text-sm text-gray-600">Rp{{ number_format($newsProduct->price) }}</p>
        </div>
        <a href="https://wa.me/6282240338227?text=Halo,%20saya%20tertarik%20untuk%20memesan%20{{ urlencode($newsProduct->name) }}.%20Bisakah%20anda%20memberikan%20informasi%20lebih%20lanjut?"
            class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M12 2C6.48 2 2 6.48 2 12c0 1.64.39 3.19 1.1 4.57L2 22l5.43-1.1C8.81 21.61 10.36 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm-.05 18c-1.2 0-2.4-.3-3.47-.87l-.25-.14-3.09.62.64-3.03-.16-.28c-.59-1.01-.88-2.17-.88-3.3 0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8z">
                </path>
                <path
                    d="M16.39 14.56c-.18-.09-1.04-.51-1.2-.57-.16-.06-.28-.09-.4.09-.11.18-.46.57-.56.69-.1.12-.21.13-.39.04-.18-.09-.77-.28-1.47-.89-.54-.48-.9-1.07-1.01-1.25-.1-.18-.01-.27.08-.36.08-.08.19-.22.28-.34.09-.12.12-.21.18-.34.06-.12.03-.25-.02-.34-.04-.09-.39-.94-.53-1.27-.14-.33-.29-.28-.39-.28-.1 0-.21 0-.33.01-.12.01-.25.02-.38.15-.13.13-.5.49-.5 1.2 0 .71.51 1.4.58 1.49.07.09 1.01 1.72 2.46 2.41.34.14.61.22.82.28.35.11.67.09.92.05.28-.04.86-.35.98-.7.12-.35.12-.65.09-.71-.03-.06-.16-.1-.34-.19z">
                </path>
            </svg>
        </a>
    </div>
</div>
