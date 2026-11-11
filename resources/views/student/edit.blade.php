{{-- Modal edit siswa, dipanggil dari halaman admin.student --}}
@php
    $isEditedStudent = (string) old('student_id') === (string) $student->id;
    $nama = $isEditedStudent ? old('nama') : $student->nama;
    $nis = $isEditedStudent ? old('nis') : $student->nis;
    $selectedClassroomId = $isEditedStudent ? old('classroom_id') : $student->classroom_id;
    $address = $isEditedStudent ? old('address') : $student->address;
    $selectedStatus = (string) ($isEditedStudent ? old('is_active', $student->is_active ? '1' : '0') : ($student->is_active ? '1' : '0'));
@endphp

<div id="edit-student-modal-{{ $student->id }}" tabindex="-1" aria-hidden="true" role="dialog" aria-modal="true"
    aria-labelledby="edit-student-modal-title-{{ $student->id }}" data-modal-backdrop="static"
    data-modal-placement="center"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <!-- Header modal -->
            <div class="flex items-start justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 id="edit-student-modal-title-{{ $student->id }}"
                        class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Data Siswa
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Perbarui data siswa di bawah ini.
                    </p>
                </div>
                <button type="button" data-modal-hide="edit-student-modal-{{ $student->id }}"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <form action="{{ route('admin.student.update', $student) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="student_id" value="{{ $student->id }}">

                <!-- Body modal -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="edit-nama-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Siswa <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="edit-nama-{{ $student->id }}" name="nama"
                                value="{{ $nama }}" maxlength="100" required placeholder="Contoh: Ahmad Fauzi"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $isEditedStudent && $errors->has('nama') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            @if ($isEditedStudent)
                                @error('nama')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            @endif
                        </div>

                        <div>
                            <label for="edit-nis-{{ $student->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                NIS <span class="text-red-600">*</span>
                            </label>
                            <input type="text" id="edit-nis-{{ $student->id }}" name="nis"
                                value="{{ $nis }}" maxlength="10" required inputmode="numeric"
                                placeholder="Contoh: 01912345"
                                class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $isEditedStudent && $errors->has('nis') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            @if ($isEditedStudent)
                                @error('nis')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="edit-classroom-{{ $student->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kelas <span class="text-red-600">*</span>
                        </label>
                        <select id="edit-classroom-{{ $student->id }}" name="classroom_id" required
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white {{ $isEditedStudent && $errors->has('classroom_id') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            <option value="" disabled @selected($selectedClassroomId === null)>Pilih kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" @selected((string) $selectedClassroomId === (string) $classroom->id)>
                                    {{ $classroom->name }} &mdash; {{ $classroom->major }}
                                </option>
                            @endforeach
                        </select>
                        @if ($isEditedStudent)
                            @error('classroom_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>

                    <div>
                        <label for="edit-address-{{ $student->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Alamat
                        </label>
                        <textarea id="edit-address-{{ $student->id }}" name="address" rows="3"
                            placeholder="Contoh: Jl. Merdeka No. 1, Bandung"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 {{ $isEditedStudent && $errors->has('address') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">{{ $address }}</textarea>
                        @if ($isEditedStudent)
                            @error('address')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>

                    <div>
                        <label for="edit-status-{{ $student->id }}"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Status
                        </label>
                        <select id="edit-status-{{ $student->id }}" name="is_active"
                            class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:text-white {{ $isEditedStudent && $errors->has('is_active') ? 'border-red-500' : 'border-gray-300 dark:border-gray-600' }}">
                            <option value="1" @selected($selectedStatus === '1')>Aktif</option>
                            <option value="0" @selected($selectedStatus === '0')>Tidak Aktif</option>
                        </select>
                        @if ($isEditedStudent)
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                </div>

                <!-- Footer modal -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan Perubahan
                    </button>
                    <button type="button" data-modal-hide="edit-student-modal-{{ $student->id }}"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
