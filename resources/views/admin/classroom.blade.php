<x-admin.layout>
    <div class="mx-auto mb-6 max-w-screen-xl px-4 lg:px-12">
        <header class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Daftar data kelas (Classroom)</p>
        </header>
    </div>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="classroom-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="classroom-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari nama kelas atau jurusan...">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambah Kelas
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">NAMA KELAS</th>
                                <th scope="col" class="px-4 py-3">JURUSAN</th>
                                <th scope="col" class="px-4 py-3">DAFTAR SISWA</th>
                                <th scope="col" class="px-4 py-3">TANGGAL DIBUAT</th>
                                <th scope="col" class="px-4 py-3 text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($classrooms as $classroom)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
                                    {{ $classroom->name }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                        {{ $classroom->major }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @if ($classroom->students->isNotEmpty())
                                        <p class="text-sm font-normal text-gray-700 dark:text-gray-300 leading-relaxed">
                                            {{ $classroom->students->pluck('nama')->implode(', ') }}
                                        </p>
                                    @else
                                        <span class="text-xs text-gray-400 italic">Belum ada siswa</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-500 dark:text-gray-400">
                                    {{ $classroom->created_at ? $classroom->created_at->format('d M Y H:i') : '-' }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="classroom-{{ $classroom->id }}-dropdown-button" data-dropdown-toggle="classroom-{{ $classroom->id }}-dropdown" class="inline-flex items-center p-1 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="classroom-{{ $classroom->id }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="classroom-{{ $classroom->id }}-dropdown-button">
                                            <li>
                                                <button type="button" data-modal-target="modal-students-{{ $classroom->id }}" data-modal-toggle="modal-students-{{ $classroom->id }}" class="w-full text-left block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Lihat Siswa</button>
                                            </li>
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-500 dark:hover:text-white">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Tidak ada data kelas ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @foreach ($classrooms as $classroom)
                <!-- Modal Detail Siswa untuk {{ $classroom->name }} -->
                <div id="modal-students-{{ $classroom->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                            <!-- Modal Header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-700">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                        Daftar Siswa di Kelas {{ $classroom->name }}
                                    </h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        Jurusan: <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $classroom->major }}</span> &bull; Total: <span class="font-semibold text-primary-600 dark:text-primary-400">{{ $classroom->students->count() }} Siswa</span>
                                    </p>
                                </div>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-students-{{ $classroom->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Tutup</span>
                                </button>
                            </div>
                            <!-- Modal Body -->
                            <div class="p-4 md:p-5 max-h-96 overflow-y-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-3 py-2">NO</th>
                                            <th scope="col" class="px-3 py-2">NAMA SISWA</th>
                                            <th scope="col" class="px-3 py-2">NIS</th>
                                            <th scope="col" class="px-3 py-2">ALAMAT</th>
                                            <th scope="col" class="px-3 py-2">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($classroom->students as $student)
                                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="px-3 py-2.5 font-medium text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
                                            <td class="px-3 py-2.5 font-semibold text-gray-900 dark:text-white">{{ $student->nama }}</td>
                                            <td class="px-3 py-2.5">{{ $student->nis }}</td>
                                            <td class="px-3 py-2.5 text-xs text-gray-500 dark:text-gray-400">{{ $student->address ?? '-' }}</td>
                                            <td class="px-3 py-2.5">
                                                <span class="text-xs font-medium px-2 py-0.5 rounded {{ $student->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                                    {{ $student->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="px-3 py-4 text-center text-gray-400">Belum ada siswa terdaftar di kelas ini.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Modal Footer -->
                            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-700">
                                <button data-modal-hide="modal-students-{{ $classroom->id }}" type="button" class="text-white bg-primary-700 hover:bg-primary-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Total Kelas:
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $classrooms->count() }}</span>
                    </span>
                </nav>
            </div>
        </div>
    </section>
</x-admin.layout>
