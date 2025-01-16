@extends('layouts.visitor')

@section('title', 'Semua Produk')

@section('content')
    <section class="w-full py-8 sm:py-10 lg:py-12 bg-gray-100">
        <div class="container mx-auto px-4 sm:px-6">
            {{-- Judul Halaman --}}
            <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8 mt-16">Semua Produk</h1>

            {{-- Search Bar --}}
            <form class="max-w-2xl mx-auto mb-8 sm:mb-10" id="search-form">
                <div class="flex flex-col sm:flex-row gap-3 items-stretch">
                    {{-- Dropdown Kategori --}}
                    <div class="relative">
                        <button id="dropdown-button" type="button"
                            class="flex items-center justify-between w-full sm:w-auto py-2.5 px-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
                            <span id="dropdown-label">All Categories</span>
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 10">
                                <path d="M1 1l8 8 8-8" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                        {{-- Dropdown Menu --}}
                        <div id="dropdown"
                            class="absolute left-0 z-20 hidden w-full sm:w-44 mt-2 bg-white divide-y divide-gray-200 rounded-lg shadow-lg max-h-48 overflow-auto">
                            <ul class="py-2 text-sm text-gray-700">
                                <li><button type="button"
                                        class="category-filter block px-4 py-2 hover:bg-gray-100">All</button></li>
                                <li><button type="button"
                                        class="category-filter block px-4 py-2 hover:bg-gray-100">Hijab</button></li>
                                <li><button type="button"
                                        class="category-filter block px-4 py-2 hover:bg-gray-100">Mukena</button></li>
                                <li><button type="button"
                                        class="category-filter block px-4 py-2 hover:bg-gray-100">Gamis</button></li>
                                <li><button type="button"
                                        class="category-filter block px-4 py-2 hover:bg-gray-100">Abaya</button></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Search Input --}}
                    <div class="relative flex-1">
                        <input type="search" id="search-input"
                            class="block w-full py-2.5 px-4 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search products..." />
                        <button type="button" id="search-button"
                            class="absolute top-0 right-0 h-full px-4 text-sm font-medium text-white bg-blue-600 rounded-r-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path d="M19 19l-4-4m0-7A7 7 0 111 8a7 7 0 0114 0z" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>

            {{-- Product Grid --}}
            <div id="product-grid" class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $product)
                    <div class="product-card bg-white p-6 rounded-xl hover:shadow-xl transition-shadow"
                        data-category="{{ $product->category }}" data-name="{{ $product->name }}">
                        <x-partials.visitor.card-product :product="$product" />
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div id="pagination" class="pagination mt-12 sm:mt-16">
                {{ $products->links() }}
            </div>
        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const products = Array.from(document.querySelectorAll(".product-card"));
            const searchInput = document.getElementById("search-input");
            const searchButton = document.getElementById("search-button");
            const categoryFilters = document.querySelectorAll(".category-filter");
            const dropdownButton = document.getElementById("dropdown-button");
            const dropdownMenu = document.getElementById("dropdown");
            const dropdownLabel = document.getElementById("dropdown-label");

            let activeCategory = "All";

            // Toggle dropdown visibility
            dropdownButton.addEventListener("click", () => {
                dropdownMenu.classList.toggle("hidden");
            });

            // Filter Products
            const filterProducts = () => {
                const searchQuery = searchInput.value.toLowerCase();
                let visibleProductCount = 0;

                products.forEach(product => {
                    const name = product.dataset.name.toLowerCase();
                    const category = product.dataset.category;

                    const matchesCategory = activeCategory === "All" || category === activeCategory;
                    const matchesSearch = name.includes(searchQuery);

                    if (matchesCategory && matchesSearch) {
                        product.style.display = "block";
                        visibleProductCount++;
                    } else {
                        product.style.display = "none";
                    }
                });

                // Toggle pagination
                document.getElementById("pagination").style.display = visibleProductCount ? "block" : "none";
            };

            // Event Listeners
            searchButton.addEventListener("click", filterProducts);
            searchInput.addEventListener("input", filterProducts);

            categoryFilters.forEach(filter => {
                filter.addEventListener("click", (e) => {
                    activeCategory = e.target.textContent;
                    dropdownLabel.textContent = activeCategory; // Update dropdown label
                    filterProducts();
                    dropdownMenu.classList.add("hidden"); // Hide dropdown after selection
                });
            });
        });
    </script>
@endsection
