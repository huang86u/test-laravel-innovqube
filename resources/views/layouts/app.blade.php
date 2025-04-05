<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>{{ $title ?? 'Réservations' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-100 text-gray-900">
        <header class="bg-primary text-white p-4">
            <div class="container mx-auto">
                <h1 class="text-xl font-bold">Gestion de Réservations</h1>
            </div>
            @auth
            <nav class="mb-6">
                <div class="mx-auto flex justify-start items-center space-x-6">
                    <a href="{{ route('properties.store') }}" class="text-primary text-white font-semibold hover:underline">
                        Propriétés
                    </a>
                    <a href="{{ route('bookings.create') }}" class="text-primary text-white font-semibold hover:underline">
                        Créer une réservation
                    </a>
                    @if(Auth::user()->email === 'alex@test.com')
                        <a href="/admin" class="text-primary text-white font-semibold hover:underline">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white font-semibold hover:underline">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </nav>
            @endauth
        </header>
        <main class="container mx-auto mt-6">
            @yield('content')
        </main>
    @livewireScripts
    </body>
</html>
