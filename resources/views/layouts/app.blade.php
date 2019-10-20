<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico"/>
        <title>Spildatabase</title>
    </head>
    <body class="bg-gray-100 font-sans text-gray-800 leading-tight antialiased">
        <div id="app">
            <div>
                <header class="bg-white border-b mb-12">
                    <div class="container mx-auto flex justify-between">
                        <div class="flex">
                            <a href="{{ route('games.index') }}" class="flex items-center mr-20">
                                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 1000 1000">
                                    <path d="M146 161h470v94H146z" class="st0"/>
                                    <path d="M146 161h94v658h-94z" class="st0"/>
                                    <path d="M193 255h47v47h-47zM146 302h47v47h-47zM193 302h47v47h-47zM146 349h47v47h-47zM193 349h47v47h-47zM146 396h47v47h-47zM193 396h47v47h-47zM146 443h47v47h-47zM193 443h47v47h-47zM146 490h47v47h-47zM193 490h47v47h-47zM146 537h47v47h-47zM193 537h47v47h-47zM146 584h47v47h-47zM193 584h47v47h-47zM146 631h47v47h-47zM193 631h47v47h-47zM146 678h47v47h-47zM193 678h47v47h-47zM146 725h47v47h-47zM193 725h47v47h-47zM146 772h47v47h-47zM193 772h47v47h-47zM616 255h47v47h-47zM663 255h47v47h-47zM616 302h47v47h-47z" class="st0"/>
                                    <path d="M616 255h94v94h-94zM663 114h94v94h-94z" class="st0"/>
                                    <path d="M710 114h47v47h-47zM663 161h47v47h-47zM710 161h47v47h-47zM710 349h47v47h-47z" class="st0"/>
                                    <path d="M710 349h94v470h-94z" class="st0"/>
                                    <path d="M710 396h47v47h-47zM757 396h47v47h-47zM710 443h47v47h-47zM757 443h47v47h-47zM710 490h47v47h-47zM757 490h47v47h-47zM710 537h47v47h-47zM757 537h47v47h-47zM710 584h47v47h-47zM757 584h47v47h-47zM710 631h47v47h-47zM757 631h47v47h-47zM710 678h47v47h-47zM757 678h47v47h-47zM710 725h47v47h-47zM757 725h47v47h-47zM710 772h47v47h-47z" class="st0"/>
                                    <path d="M146 725h658v94H146z" class="st0"/>
                                    <path d="M616 725h47v47h-47zM663 725h47v47h-47zM616 772h47v47h-47zM663 772h47v47h-47zM522 725h47v47h-47zM569 725h47v47h-47zM522 772h47v47h-47zM569 772h47v47h-47zM428 725h47v47h-47zM475 725h47v47h-47zM428 772h47v47h-47zM475 772h47v47h-47zM334 725h47v47h-47zM381 725h47v47h-47zM334 772h47v47h-47zM381 772h47v47h-47zM240 725h47v47h-47zM287 725h47v47h-47zM240 772h47v47h-47zM287 772h47v47h-47zM804 208h47v47h-47zM851 67h47v47h-47z" class="st0"/>
                                </svg>
                            </a>

                            <nav class="flex">
                                <a href="{{ route('games.index') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Find spil</div>
                                </a>

                                <a href="{{ route('games.popular') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Populære spil</div>
                                </a>

                                <a href="{{ route('games.newest') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Nyeste spil</div>
                                </a>

                                <a href="{{ route('publishers.index') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Udgivere</div>
                                </a>
                            </nav>
                        </div>

                        <div class="flex">
                            @if (auth()->guest())
                                <a href="{{ route('users.create') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Opret bruger</div>
                                </a>

                                <a href="{{ route('login') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Log ind</div>
                                </a>
                            @else
                                <a href="{{ route('games.create') }}" class="flex items-center px-5 py-6 hover:bg-gray-100">
                                    <div>Tilføj spil</div>
                                </a>

                                <div class="flex flex-col items-center group">
                                    <div class="px-5 py-6">
                                        {{ auth()->user()->name }}
                                    </div>
                                    <div class="relative w-full">
                                        <div class="absolute whitespace-no-wrap bg-white rounded rounded-t-none border border-gray-300 right-0 top-0 right-0 hidden group-hover:block">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('reviews.index') }}" class="px-6 py-3 block text-sm hover:bg-gray-100">Gennemgå spil</a>
                                                </li>

                                                @if (auth()->user()->isAdmin())
                                                    <li>
                                                        <a href="{{ route('admins.index') }}" class="px-6 py-3 block text-sm hover:bg-gray-100">Admins</a>
                                                    </li>
                                                @endif

                                                <li>
                                                    <a href="{{ route('sessions.destroy') }}" class="px-6 py-3 block text-sm hover:bg-gray-100">Log ud</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </header>

                <div class="container mx-auto mb-24">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>