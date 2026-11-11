<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
        @vite('resources/css/app.css')
        <title>Document</title>
    </head>
    <body>
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <x-admin.navbar /> 
            <x-admin.sidebar /> 
            <main class="p-4 md:ml-64 h-auto pt-20">
                <div class="mx-auto max-w-7x1 px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </html>
</div>