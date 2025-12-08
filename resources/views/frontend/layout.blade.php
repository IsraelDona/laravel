<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Culture Bénin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .pt-navbar {
            padding-top: 70px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- NAVBAR SIMPLIFIÉE -->
    <nav class="navbar-fixed">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <img src="{{ asset('adminLTE/img/benin.png') }}" 
                         alt="Benin" 
                         class="h-10 w-10 object-cover">
                    <div>
                        <div class="font-bold text-lg text-gray-800">Culture BENIN</div>
                        <div class="text-xs text-gray-500">Patrimoine National</div>
                    </div>
                </div>

                <!-- Menu Desktop -->
                <div class="hidden md:flex items-center gap-1 flex-grow justify-center">
                    <a href="{{ route('front.accueil') }}" 
                       class="px-4 py-2 text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('front.accueil') ? 'text-green-700 font-semibold' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('front.contenus') }}" 
                       class="px-4 py-2 text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('front.contenus') ? 'text-green-700 font-semibold' : '' }}">
                        Contenus
                    </a>
                    <a href="{{ route('front.regions') }}" 
                       class="px-4 py-2 text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('front.regions') ? 'text-green-700 font-semibold' : '' }}">
                        Régions
                    </a>
                    <a href="{{ route('front.contact') }}" 
                       class="px-4 py-2 text-gray-700 hover:text-green-700 font-medium {{ request()->routeIs('front.contact') ? 'text-green-700 font-semibold' : '' }}">
                        Contact
                    </a>
                </div>

                <!-- Boutons auth -->
                <div class="hidden md:flex items-center gap-1 ml-auto">
                    @guest
                        <a href="{{ route('utilisateur_register') }}" 
                           class="px-4 py-2 text-green-700 hover:text-green-900 font-medium">
                            S'inscrire
                        </a>
                        <a href="{{ route('utilisateur_login') }}" 
                           class="ml-2 px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700">
                            Connexion
                        </a>
                    @else
                        @if(Auth::user() instanceof \App\Models\User)
                            <a href="{{ route('dashboard') }}" 
                               class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium hover:bg-blue-200">
                                Admin
                            </a>
                        @else
                            <a href="{{ route('utilisateurs.dashboard') }}" 
                               class="px-4 py-2 bg-green-100 text-green-700 rounded-lg font-medium hover:bg-green-200">
                                Mon espace
                            </a>
                        @endif
                        <form action="{{ route('utilisateurs.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="ml-2 px-4 py-2 text-gray-600 hover:text-red-600 font-medium">
                                Déconnexion
                            </button>
                        </form>
                    @endguest
                </div>

                <!-- Menu Mobile -->
                <button class="md:hidden text-gray-700" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Menu Mobile (caché) -->
    <div class="md:hidden hidden bg-white shadow-lg absolute top-16 left-0 right-0 z-50" id="mobile-menu">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ route('front.accueil') }}" class="block py-2 text-gray-700 hover:text-green-700">Accueil</a>
            <a href="{{ route('front.contenus') }}" class="block py-2 text-gray-700 hover:text-green-700">Contenus</a>
            <a href="{{ route('front.regions') }}" class="block py-2 text-gray-700 hover:text-green-700">Régions</a>
            <a href="{{ route('front.contact') }}" class="block py-2 text-gray-700 hover:text-green-700">Contact</a>
            
            @guest
                <a href="{{ route('utilisateur_register') }}" class="block py-2 text-green-700">S'inscrire</a>
                <a href="{{ route('utilisateur_login') }}" class="block py-3 bg-green-600 text-white rounded-lg text-center">Connexion</a>
            @else
                @if(Auth::user() instanceof \App\Models\User)
                    <a href="{{ route('dashboard') }}" class="block py-3 bg-blue-100 text-blue-700 rounded-lg text-center">Admin</a>
                @else
                    <a href="{{ route('utilisateurs.dashboard') }}" class="block py-3 bg-green-100 text-green-700 rounded-lg text-center">Mon espace</a>
                @endif
                <form action="{{ route('utilisateurs.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 text-gray-600 hover:text-red-600">Déconnexion</button>
                </form>
            @endguest
        </div>
    </div>

    <!-- Contenu principal -->
    <main class="pt-navbar min-h-screen">
        @yield('content')
    </main>

    <!-- FOOTER SIMPLIFIÉ -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="font-bold text-lg mb-4">Culture Bénin</h3>
                    <p class="text-gray-300 text-sm">
                        Préservation et promotion du patrimoine culturel béninois.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('front.accueil') }}" class="text-gray-300 hover:text-white">Accueil</a></li>
                        <li><a href="{{ route('front.contenus') }}" class="text-gray-300 hover:text-white">Contenus</a></li>
                        <li><a href="{{ route('front.regions') }}" class="text-gray-300 hover:text-white">Régions</a></li>
                        <li><a href="{{ route('front.contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Contact</h4>
                    <div class="space-y-2 text-gray-300">
                        <p>contact@culturebenin.bj</p>
                        <p>+229 XX XX XX XX</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} Culture Bénin. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function(e) {
            e.stopPropagation();
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Fermer le menu en cliquant ailleurs
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            if (!menu.contains(event.target) && !button.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Fermer le menu mobile en cliquant sur un lien
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>