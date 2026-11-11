{{-- Modal form tambah siswa, dipanggil dari halaman admin.student --}}
<div id="create-student-modal" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
    aria-labelledby="create-student-modal-title" data-modal-backdrop="static" data-modal-placement="center"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <!-- Header modal -->
            <div class="flex items-start justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 id="create-student-modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Data Siswa
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Lengkapi data siswa di bawah ini.
                    </p>
                </div>
                <button type="button" data-modal-hide="create-student-modal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf

                <!-- Body modal -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Siswa <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" maxlength="100" required
                                placeholder="Contoh: Ahmad Fauzi"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            @error('nama')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIS <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="nis" name="nis" value="{{ old('nis') }}" maxlength="10" required
                                inputmode="numeric" placeholder="Contoh: 01912345"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $errors->has('nis') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            @error('nis')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kelas <span class="text-red-600">*</span>
                        </label>
                        <select id="classroom_id" name="classroom_id" required
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white {{ $errors->has('classroom_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            <option value="" disabled @selected(old('classroom_id') === null)>Pilih kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" @selected((string) old('classroom_id') === (string) $classroom->id)>
                                    {{ $classroom->name }} &mdash; {{ $classroom->major }}
                                </option>
                            @endforeach
                        </select>
                        @if ($classrooms->isEmpty())
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Belum ada data kelas. Tambahkan kelas terlebih dahulu.
                            </p>
                        @endif
                        @error('classroom_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat
                        </label>
                        <textarea id="address" name="address" rows="3"
                            placeholder="Contoh: Jl. Merdeka No. 1, Bandung"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $errors->has('address') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status
                        </label>
                        <select id="is_active" name="is_active"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white {{ $errors->has('is_active') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            <option value="1" @selected((string) old('is_active', '1') === '1')>Aktif</option>
                            <option value="0" @selected((string) old('is_active') === '0')>Tidak Aktif</option>
                        </select>
                        @error('is_active')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Footer modal -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan
                    </button>
                    <button type="button" data-modal-hide="create-student-modal"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (($errors->any() && ! old('student_id')) || ($openCreateModal ?? false))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('create-student-trigger')?.click();
        });
    </script>
@endif
