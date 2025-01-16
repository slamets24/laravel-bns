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
            <li class="font-medium text-primary">Tambah Produk</li>
        </ol>
    </nav>

    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-1">
            <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard">Tambah Produk</h1>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <label for="image" class="block mb-2 text-sm font-medium text-black dark:text-white">
                    Masukan Foto <span class="text-red-500">*</span>
                </label>
                <p class="text-xs font-medium text-gray-400">* Pastikan file bertipe jpeg, jpg, png</p>
                <p class="text-xs font-medium text-gray-400">* Maksimal file 1MB</p>
                <div id="imagePreviewContainer" class="flex flex-wrap gap-5 mt-3"></div>
                <input type="file" accept="image/*" name="images[]" id="images" class="mt-3" multiple>
                <x-partials.dashboard.input-error :messages="$errors->get('images.')" />
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">
                <div class="mb-5">
                    <label for="name"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="name" autocomplete="name" maxlength="75"
                        placeholder="Masukan Nama Produk" value="{{ old('name') }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                    <x-partials.dashboard.input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-5">
                    <label for="description"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="5" cols="30" id="description" required name="description" placeholder="Masukan Deskripsi"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition  active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard ">{{ old('description') }}</textarea>
                    <x-partials.dashboard.input-error :messages="$errors->get('description')" />
                </div>

                <div class="mb-5">
                    <label for="price"
                        class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="price" autocomplete="price" maxlength="75"
                        placeholder="Masukan Harga" value="{{ old('price') }}"
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
                                {{ old('category') == 'hijab' ? 'selected' : '' }}>
                                Hijab</option>
                            <option value="mukena" class="text-body capitalize"
                                {{ old('category') == 'mukena' ? 'selected' : '' }}>
                                Mukena</option>
                            <option value="gamis" class="text-body capitalize"
                                {{ old('category') == 'gamis' ? 'selected' : '' }}>
                                Gamis</option>
                            <option value="abaya" class="text-body capitalize"
                                {{ old('category') == 'abaya' ? 'selected' : '' }}>
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
                            placeholder="Masukan Link Shopee" value="{{ old('url_shopee') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_shopee')" />
                    </div>

                    <div class="w-full">
                        <label for="url_tokped"
                            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            Link Tokped
                        </label>
                        <input type="text" name="url_tokped" autocomplete="url_tokped" maxlength="75"
                            placeholder="Masukan Link Tokped" value="{{ old('url_tokped') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_tokped')" />
                    </div>

                    <div class="w-full">
                        <label for="url_wa"
                            class="block mb-3 text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                            No Whatsapp <span class="text-red-500">*</span>
                        </label>
                        <input type="text" required name="url_wa" autocomplete="url_wa" maxlength="75"
                            placeholder="Masukan No Whatsapp" value="{{ old('url_wa') }}"
                            class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary">
                        <x-partials.dashboard.input-error :messages="$errors->get('url_wa')" />
                    </div>
                </div>

                <div class="mb-5">
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
                </div>
            </div>

            <button type="submit"
                class="flex justify-center w-full p-3 font-medium text-white rounded bg-gray-800 hover:bg-opacity-90">
                Kirim
            </button>
        </div>
    </form>

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
