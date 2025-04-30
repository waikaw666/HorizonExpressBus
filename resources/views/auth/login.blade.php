

<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Horizon Admin</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
    rel="stylesheet">

<body>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form method="POST" action="/admin/sign-in" class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <h2 class="text-2xl font-bold text-center mb-6 text-blue-500">Admin Login</h2>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required autofocus
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input
                type="password"
                name="password"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>

        <div class="mb-4">
            <button
                type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300"
            >
                Login
            </button>
        </div>
    </form>
</div>
</body>
</html>
