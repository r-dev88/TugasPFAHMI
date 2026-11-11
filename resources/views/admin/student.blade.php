<x-admin.layout>
    <div class="mx-auto mb-6 max-w-screen-xl px-4 lg:px-12">
        <header class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Daftar siswa</p>
        </header>
    </div>

    @if (session('success'))
        <div class="mx-auto mb-6 max-w-screen-xl px-4 lg:px-12">
            <div class="flex items-center rounded-xl border border-green-300 bg-green-50 p-4 text-sm text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="w-4 h-4 mr-3 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414Z" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col gap-3 p-4 lg:flex-row lg:items-center lg:justify-between">
                    <form method="GET" action="{{ route('admin.student.index') }}"
                        class="flex w-full flex-col gap-2 sm:flex-row sm:flex-wrap lg:max-w-4xl">
                        <div class="relative w-full sm:w-64">
                            <label for="student-search" class="sr-only">Cari siswa</label>
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="search" id="student-search" name="search" value="{{ $search }}"
                                placeholder="Cari nama, NIS, atau alamat..."
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                        </div>

                        <select name="classroom_id"
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" @selected($classroomId === $classroom->id)>
                                    {{ $classroom->name }}
                                </option>
                            @endforeach
                        </select>

                        <select name="status"
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">Semua Status</option>
                            <option value="active" @selected($status === 'active')>Aktif</option>
                            <option value="inactive" @selected($status === 'inactive')>Tidak Aktif</option>
                        </select>

                        <button type="submit"
                            class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Cari
                        </button>

                        @if ($search !== '' || $classroomId > 0 || $status !== '')
                            <a href="{{ route('admin.student.index') }}"
                                class="inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                Reset
                            </a>
                        @endif
                    </form>

                    <button type="button" id="create-student-trigger" data-modal-target="create-student-modal"
                        data-modal-toggle="create-student-modal"
                        class="flex flex-shrink-0 items-center justify-center rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="mr-2 h-3.5 w-3.5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah Siswa
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">NAMA</th>
                                <th scope="col" class="px-4 py-3">KELAS</th>
                                <th scope="col" class="px-4 py-3">NIS</th>
                                <th scope="col" class="px-4 py-3">ALAMAT</th>
                                <th scope="col" class="px-4 py-3">STATUS</th>
                                <th scope="col" class="px-4 py-3 text-right">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="border-b hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <th scope="row"
                                        class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $students->firstItem() + $loop->index }}
                                    </th>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $student->nama }}
                                    </td>
                                    <td class="px-4 py-3">{{ $student->classroom?->name ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $student->nis }}</td>
                                    <td class="max-w-xs px-4 py-3">
                                        {{ $student->address ? \Illuminate\Support\Str::limit($student->address, 40) : '-' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="rounded px-2.5 py-0.5 text-xs font-medium {{ $student->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                            {{ $student->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button" id="edit-student-trigger-{{ $student->id }}"
                                                data-modal-target="edit-student-modal-{{ $student->id }}"
                                                data-modal-toggle="edit-student-modal-{{ $student->id }}"
                                                class="inline-flex items-center whitespace-nowrap rounded-lg bg-yellow-400 px-3 py-2 text-xs font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800">
                                                Edit
                                            </button>

                                            <form action="{{ route('admin.student.destroy', $student) }}" method="POST"
                                                onsubmit="return confirm('Hapus data siswa ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center whitespace-nowrap rounded-lg bg-red-600 px-3 py-2 text-xs font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                        Tidak ada data siswa ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div
                    class="flex flex-col gap-3 border-t border-gray-200 p-4 dark:border-gray-700 md:flex-row md:items-center md:justify-between">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Menampilkan
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $students->firstItem() ?? 0 }}</span>
                        &ndash;
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $students->lastItem() ?? 0 }}</span>
                        dari
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $students->total() }}</span>
                        siswa
                    </p>

                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </section>

    @include('student.create')

    @foreach ($students as $student)
        @include('student.edit', ['student' => $student])
    @endforeach

    @if ($errors->any() && old('student_id'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.getElementById('edit-student-trigger-{{ (int) old('student_id') }}')?.click();
            });
        </script>
    @endif
</x-admin.layout>
