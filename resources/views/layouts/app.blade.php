<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Mockup</title>
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div>
        <header class="bg-white border-b py-4 mb-12">
            <div class="container mx-auto flex">
                <div class="w-1/4"></div>

                <div class="flex-1">
                    <label class="relative block">
                        <div class="inset-y-0 absolute left-0 flex items-center justify-center px-4">
                            <svg class="fill-current text-gray-600 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                            </svg>
                        </div>
                        <input placeholder="Søg efter spil" class="bg-gray-200 text-gray-600 pl-12 rounded py-3 pr-4 focus:outline-none w-full">
                    </label>
                </div>

                <div class="w-1/4 flex justify-end">
                    <div class="w-12 h-12 rounded-full bg-gray-200"></div>
                </div>
            </div>
        </header>

        <div class="container mx-auto mb-24">
            @yield('content')
        </div>
    </div>
</body>
</html>