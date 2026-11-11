<x-admin.layout>
    <div class="max-w-3xl">
        <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-8">
            <header class="mb-8 border-b border-gray-200 pb-6 dark:border-gray-700">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">About Me</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">もういいや</p>
            </header>

            <dl class="space-y-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $nama }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $kelas }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">GitHub</dt>
                    <dd class="mt-1 break-all text-lg font-semibold">
                        <a href="{{ $REPO }}" target="_blank" rel="noopener noreferrer"
                            class="text-blue-600 hover:underline dark:text-blue-400">
                            {{ $REPO }}
                        </a>
                    </dd>
                </div>
            </dl>
        </section>
    </div>
</x-admin.layout>
