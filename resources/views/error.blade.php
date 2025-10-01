<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-md w-full text-center">
        <div class="flex flex-col items-center">
            <svg class="w-16 h-16 text-red-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                <path stroke="currentColor" stroke-width="2" d="M8 8l8 8M16 8l-8 8"/>
            </svg>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Oops! Something went wrong.</h1>
            <p class="text-gray-600 mb-6">
                <?php echo isset($errorMessage) ? htmlspecialchars($errorMessage) : 'An unexpected error has occurred. Please try again later.'; ?>
            </p>
            <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">Go Home</a>
        </div>
    </div>
</body>
</html>