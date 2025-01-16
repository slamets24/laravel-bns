<x-app-layout>
    <x-slot:title>Data Produk | </x-slot:title>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium text-gray-600" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">
                <a class="font-medium text-gray-600" href="{{ route('products.index') }}">Produk /</a>
            </li>
            <li class="font-medium text-primary">Edit Produk</li>
        </ol>
    </nav>

    <div class="form-1">
        <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Edit Produk</h1>

        <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="mb-5">
                    <label for="name"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="name" autocomplete="name" maxlength="75"
                        placeholder="Masukan Nama Produk" value="{{ $product->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                    <x-partials.dashboard.input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-5">
                    <label for="description"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="5" cols="30" id="description" required name="description" placeholder="Masukan Deskripsi"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition  active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard ">{{ $product->description }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>

                <div class="mb-5">
                    <label for="price"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="price" autocomplete="price" maxlength="75"
                        placeholder="Masukan Harga" value="{{ number_format($product->price) }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                    <x-partials.dashboard.input-error :messages="$errors->get('price')" />
                </div>

                <div class="mb-5">
                    <label for="category"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent dark:bg-form-input">
                        <select required name="category"
                            class="relative z-20 w-full appearance-none capitalize rounded border border-stroke bg-transparent px-5 py-3 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                            :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true">
                            <option disabled selected class="text-body capitalize">Pilih Kategori</option>
                            <option value="hijab" class="text-body capitalize"
                                {{ $product->category == 'hijab' ? 'selected' : '' }}>
                                Hijab</option>
                            <option value="mukena" class="text-body capitalize"
                                {{ $product->category == 'mukena' ? 'selected' : '' }}>
                                Mukena</option>
                            <option value="gamis" class="text-body capitalize"
                                {{ $product->category == 'gamis' ? 'selected' : '' }}>
                                Gamis</option>
                            <option value="abaya" class="text-body capitalize"
                                {{ $product->category == 'abaya' ? 'selected' : '' }}>
                                Abaya</option>
                        </select>
                        <x-partials.dashboard.input-error :messages="$errors->get('category')" />
                    </div>
                </div>

                <div class="mb-5 flex gap-4">
                    <div class="w-full">
                        <label for="url_shopee"
                            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Link Shopee
                        </label>
                        <input type="text" name="url_shopee" autocomplete="url_shopee" maxlength="75"
                            placeholder="Masukan Link Shopee" value="{{ $product->url_shopee }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_shopee')" />
                    </div>

                    <div class="w-full">
                        <label for="url_tokped"
                            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Link Tokped
                        </label>
                        <input type="text" name="url_tokped" autocomplete="url_tokped" maxlength="75"
                            placeholder="Masukan Link Tokped" value="{{ $product->url_tokped }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_tokped')" />
                    </div>

                    <div class="w-full">
                        <label for="url_wa"
                            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            No Whatsapp <span class="text-red-500">*</span>
                        </label>
                        <input type="text" required name="url_wa" autocomplete="url_wa" maxlength="75"
                            placeholder="Masukan No Whatsapp" value="{{ $product->url_wa }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_wa')" />
                    </div>
                </div>
            </div>

            <button type="submit"
                class="flex justify-center w-full p-3 font-medium text-white rounded bg-gray-800 hover:bg-opacity-90">
                Kirim
            </button>
        </form>
    </div>


    {{-- <div class="mb-5">
        <label for="colors.1"
            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
            Varian Warna <span class="text-red-500">*</span>
        </label>
        <div class="mb-6">
            <input type="text" required id="colors.1" autocomplete="colors[1]" maxlength="75"
                placeholder="Masukan Varian Warna " value="{{ old('colors.1') }}"
                class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
            <x-partials.dashboard.input-error :messages="$errors->get('colors.1')" />
        </div>

        <div id="newColorRow" class="mt-6"></div>

        <div class="">
            <button type="button" id="addColorRowButton"
                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded bg-gray-800 hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary">
                Tambah Jenis Warna </button>
        </div>
    </div> --}}

    {{-- START NAV TABS --}}
    <div class="px-6 py-6 mt-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">

            {{-- START TABS --}}
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="image-tab" data-tabs-target="#image" type="button" role="tab"
                        aria-controls="image" aria-selected="false">Galeri </button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Warna</button>
                </li>
            </ul>
            {{-- END TABS --}}

            <div id="default-tab-content">
                {{-- START TAB CONTENT image --}}
                <div class="hidden p-4 rounded-lg " id="image" role="tabpanel" aria-labelledby="image-tab">
                    <div class="">
                        <div class="text-center text-black dark:text-white-dahsboard">
                            <h2>Galeri</h2>
                        </div>

                        <div class="mb-4">
                            <button data-modal-target="crud-modal-4" data-modal-toggle="crud-modal-4"
                                class="px-4 py-2 text-white rounded-md bg-gray-800 ">Tambah
                                Galeri</button>
                        </div>

                        {{-- Form Galeri --}}
                        @foreach ($product->images as $image)
                            <div class="py-2 border-b-2 border-stone-200">
                                <div class="flex items-center justify-between ">
                                    <div class="object-contain w-40 overflow-hidden rounded-md">
                                        <a href="{{ Storage::url($image->name) }}" target="_blank">
                                            <img class="w-full" src="{{ Storage::url($image->name) }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <form action="{{ Route('products.destroyImage', [$product->id, $image->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 text-white rounded-md bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        <!-- Main modal -->
                        <div id="crud-modal-4" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Tambah Galeri
                                        </h3>
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="crud-modal-4">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('products.addImages', $product->id) }}" method="POST"
                                        enctype="multipart/form-data" class="p-4 md:p-5">
                                        @csrf
                                        @method('POST')

                                        <div class="px-6 py-6 mb-6 bg-white rounded-lg dark:bg-black">
                                            <label for="images"
                                                class="block mb-2 text-sm font-medium text-black dark:text-white">
                                                Masukan Foto <span class="text-red-500">*</span>
                                            </label>
                                            <p class="text-xs font-medium text-red-500">* Menambahkan foto bisa lebih
                                                dari
                                                satu</p>
                                            <p class="text-xs font-medium text-red-500">* Pastikan file bertipe jpeg,
                                                jpg,
                                                png</p>
                                            <p class="text-xs font-medium text-red-500">* Maksimal file 1MB</p>
                                            <input type="file" required multiple accept="image/*" name="images[]"
                                                id="images" class="mt-3">
                                            <x-partials.dashboard.input-error :messages="$errors->get('images.*')" />
                                        </div>
                                        <div class="pb-4 text-center ">

                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Kirim
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- End --}}
                    </div>
                </div>
                {{-- END TAB CONTENT image --}}
            </div>

            {{-- START TAB CONTENT Warna --}}
            <div class="hidden p-4 rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="mb-6 text-center text-black dark:text-white">
                    <h2>Warna</h2>
                </div>

                @forelse ($product->colors as $color)
                    <div class="flex gap-3 mb-6 ">
                        <div class="w-full ">
                            <input id="color" disabled
                                class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                type="text" maxlength="50" value="{{ $color->name }}" autocomplete="colors"
                                name="color" placeholder="Masukkan Warna">
                        </div>

                        {{-- Button Delete --}}
                        <form action="{{ route('products.destroyColor', [$product->id, $color->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button
                                class="px-6 py-3 text-white transition-colors duration-300 ease-in-out rounded shadow-md bg-red-700 hover:bg-red-700-dark focus:outline-none focus:ring-2 focus:ring-danger">Hapus</button>
                        </form>
                    </div>
                @empty
                    <p class="mb-5 text-center">Belum ada Warna</p>
                @endforelse


                <!-- Modal toggle -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah
                </button>

                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Warna
                                </h3>
                                <button type="button"
                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" method="POST"
                                action="{{ route('products.addColor', $product->id) }}">
                                @csrf
                                @method('POST')

                                <div class="px-3 mb-4">
                                    <label for="color"
                                        class="block mb-3 text-sm font-medium text-black dark:text-white">
                                        Warna
                                    </label>
                                    <input id="color"
                                        class="w-full rounded border-[1.5px] border-black bg-transparent px-5 py-3 font-normal dark:bg-black text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:text-white dark:focus:border-primary"
                                        value="{{ old('color') }}" type="text" maxlength="50" name="color"
                                        placeholder="Masukkan Warna">
                                    <x-partials.dashboard.input-error :messages="$errors->get('color')" />
                                </div>
                                <div class="pb-4 text-center ">

                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Kirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END TAB CONTENT FACILITY/Warna --}}
        </div>
    </div>
    {{-- END NAV TABS --}}

    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const files = event.target.files;
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            imagePreviewContainer.innerHTML = ''; // Clear previous images

            for (const file of files) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-32 h-32 object-cover rounded-lg';
                    imagePreviewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        let colorCount = 1;
        addColorRowButton.addEventListener('click', () => {
            colorCount++;

            const html = `
                    <div class="mb-6">
                        <input type="text" required id="colors.${colorCount}" name="colors[${colorCount}]" autocomplete="colors[${colorCount}]" maxlength="75"
                            placeholder="Masukan Varian Warna ${colorCount}" value="{{ old('colors.${colorCount}') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('colors.${colorCount}')" />
                    </div>
            `;

            const newRow = document.createElement("div");
            newRow.innerHTML = html;
            newColorRow.appendChild(newRow);
        });
    </script>
</x-app-layout>
