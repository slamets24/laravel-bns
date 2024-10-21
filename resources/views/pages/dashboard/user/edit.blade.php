<x-app-layout>
    <x-slot:title>Data User | </x-slot:title>

    {{-- Breadcrumb --}}
    <nav class="mb-5">
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium text-gray-600" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-primary">
                <a class="font-medium text-gray-600" href="{{ route('users.index') }}">User /</a>
            </li>
            <li class="font-medium text-primary">Update User</li>
        </ol>
    </nav>

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-1">
            <div class="">
                <h1 class="mb-6 text-xl font-bold text-black-dashboard dark:text-white-dahsboard"> Tambah Pengguna
                </h1>
            </div>

            <div class="px-6 py-6 mb-6 bg-white rounded-lg shadow-lg dark:bg-black">

                <div class="mb-5">
                    <label for="name"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" required name="name" autocomplete="name" maxlength="100"
                        placeholder="Masukan Nama" value="{{ $user->name }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary" />
                    <x-partials.dashboard.input-error :messages="$errors->get('name')" />
                </div>

                <div class="mb-5">
                    <label for="email"
                        class="mb-3 block text-sm font-medium text-black-dashboard dark:text-white-dahsboard">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" required name="email" autocomplete="email" placeholder="Masukan Email"
                        maxlength="100" value="{{ $user->email }}"
                        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black-dashboard outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white-dahsboard dark:focus:border-primary " />
                    <x-partials.dashboard.input-error :messages="$errors->get('email')" />
                </div>
            </div>
        </div>

        <button type="submit"
            class="flex justify-center w-full p-3 font-medium text-white rounded bg-gray-800 hover:bg-opacity-90">
            Kirim
        </button>
    </form>
</x-app-layout>
