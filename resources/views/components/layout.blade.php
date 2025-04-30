<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',
 app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Horizon Express</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <div class="min-h-full">
        <x-nav></x-nav>

        {{$heading}}

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 min-h-[90vh]">
                {{$slot}}
            </div>
        </main>
    </div>
    <footer class="bg-blue-950 ">
        <div class="flex justify-between max-w-2xl mx-auto py-8">
            <div>
                <p class="text-xl font-semibold text-gray-100 mb-4">
                    Need Help?
                </p>
                <p class="text-gray-200">
                    &phone; 09-777-889-999
                </p>
                <p class="text-gray-200">&#9993; customerservice@horizonexpress.com</p>
            </div>
            <div class="flex flex-col">
                <p class="text-xl font-semibold text-gray-100 mb-4">Quick Link</p>
                <a class="text-gray-200" href="/">Home</a>
                <a class="text-gray-200" href="/about">About</a>
                <a class="text-gray-200" href="/contact">Contact</a>
            </div>
        </div>
        <div class="bg-gray-900/50 py-1">
            <p class="text-gray-400 text-center">&copy;2024 Horizon Express </p>
        </div>

    </footer>
</html>
