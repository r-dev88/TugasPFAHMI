<x-admin.layout>
    <div class="mx-auto mb-6 max-w-screen-xl px-4 lg:px-12">
        <div class="flex items-center justify-between">
            <header class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8 flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $classroom->name }}</h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Jurusan: <span class="font-semibold text-gray-800 dark:text-gray-200">{{ $classroom->major }}</span></p>
                    </div>
                    <a href="{{ url('/admin/classroom') }}" class="inline-flex items-center text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 px-4 py-2 rounded-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar Kelas
                    </a>
                </div>
            </header>
        </div>
    </div>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Daftar Siswa di Kelas {{ $classroom->name }} (Total: {{ $students->count() }} Siswa)
                    </h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">NAMA SISWA</th>
                                <th scope="col" class="px-4 py-3">NIS</th>
                                <th scope="col" class="px-4 py-3">ALAMAT</th>
                                <th scope="col" class="px-4 py-3">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-4 py-3 font-semibold text-gray-900 dark:text-white">
                                    {{ $student->nama }}
                                </td>
                                <td class="px-4 py-3">{{ $student->nis }}</td>
                                <td class="px-4 py-3">{{ $student->address ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span class="text-xs font-medium px-2.5 py-0.5 rounded {{ $student->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                        {{ $student->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada siswa yang terdaftar di kelas ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin.layout>
