@extends('frontend.layout')

@section('title', 'Accueil - Culture Bénin')

@section('content')

<!-- HERO SECTION AVEC CAROUSEL -->
<section class="relative h-[600px] overflow-hidden">
    <!-- Carousel -->
    <div class="absolute inset-0">
        <div class="carousel-container relative w-full h-full">
            <!-- SLIDE 1 : Ton image -->
            <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('/adminLTE/img/image.benin.jpg') }}" 
                     alt="Culture Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            
            <!-- SLIDE 2 : Image culturelle -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('/adminLTE/img/amazone.png') }}" 
                     alt="Culture Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            
            <!-- SLIDE 3 : Image patrimoine -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('/adminLTE/img/monument.webp') }}" 
                     alt="Culture Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            
            <!-- SLIDE 4 : Image artisanat -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out">
                <img src="{{ asset('/adminLTE/img/talon.jpeg') }}" 
                     alt="Culture Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
        </div>
    </div>

    <!-- Contenu du hero - CENTRÉ comme sur la capture -->
    <div class="max-w-4xl mx-auto px-6 relative z-10 h-full flex flex-col items-center justify-center text-center">
        <!-- Titre principal -->
        <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-lg mb-6">
            Explorez la richesse culturelle du Bénin
        </h1>

        <!-- Sous-titre avec séparateurs -->
        <p class="text-xl md:text-2xl text-gray-100 mb-8 flex flex-wrap justify-center items-center gap-4">
            <span class="px-2">Traditions • Danses • Patrimoine • Histoire • Artisanat</span>
        </p>

        <!-- Boutons d'action -->
        <div class="mt-6 flex flex-wrap gap-4 justify-center">
            <a href="{{ route('front.contenus') }}" 
               class="px-8 py-4 rounded-lg bg-yellow-500 text-black font-bold shadow-lg hover:bg-yellow-600 transition-all transform hover:scale-105 flex items-center gap-3 text-lg">
                <i class="fas fa-play-circle"></i>
                Voir les contenus
            </a>
            <a href="{{ route('front.regions') }}" 
               class="px-8 py-4 rounded-lg border-2 border-white text-white font-bold hover:bg-white/10 transition-all flex items-center gap-3 text-lg">
                <i class="fas fa-map-marked-alt"></i>
                Explorer les régions
            </a>
        </div>
    </div>
    
    <!-- Contrôles du carousel -->
    <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full transition backdrop-blur-sm">
        <i class="fas fa-chevron-left"></i>
    </button>
    
    <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full transition backdrop-blur-sm">
        <i class="fas fa-chevron-right"></i>
    </button>
    
    <!-- Indicateurs de slide -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20 flex gap-2">
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white cursor-pointer transition hover:scale-125" data-slide="0"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 cursor-pointer transition hover:scale-125" data-slide="1"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 cursor-pointer transition hover:scale-125" data-slide="2"></button>
        <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 cursor-pointer transition hover:scale-125" data-slide="3"></button>
    </div>
</section>

<!-- SECTION CARDS AVEC IMAGES RÉELLES -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-green-900">Découvrez Notre Patrimoine</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Explorez les différentes facettes de la culture béninoise</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Carte Traditions -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
            <div class="h-48 bg-cover bg-center relative overflow-hidden">
                <img src="{{ asset('/adminLTE/img/talon.jpeg') }}" 
                     alt="Traditions Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Traditions</span>
                </div>
            </div>
            <div class="p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-green-700 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-2xl text-green-800">Traditions</h3>
                </div>
                <p class="text-gray-600 mb-6">Coutumes ancestrales, rites traditionnels et pratiques culturelles transmises de génération en génération.</p>
                <a href="{{ route('front.contenus') }}?categorie=traditions" 
                   class="inline-flex items-center gap-2 text-green-700 hover:text-green-900 font-semibold group-hover:gap-3 transition-all">
                    Explorer les traditions
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Carte Danses -->
    <!-- Carte Danses avec vidéo et contrôles -->
<div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
    <div class="h-48 relative overflow-hidden">
        <!-- Vidéo avec contrôles -->
        <video 
            id="dance-video"
            class="absolute w-full h-full object-cover"
            poster="{{ asset('/adminLTE/img/amazone.png') }}"
            preload="metadata"
        >
            <source src="{{ asset('/adminLTE/videos/danse-traditionnelle.mp4') }}" type="video/mp4">
            <source src="{{ asset('/adminLTE/videos/danse-traditionnelle.webm') }}" type="video/webm">
            <img src="{{ asset('/adminLTE/img/amazone.png') }}" 
                 alt="Danse traditionnelle" 
                 class="w-full h-full object-cover">
        </video>
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
        
        <!-- Contrôles vidéo personnalisés -->
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex items-center gap-2 bg-black/50 backdrop-blur-sm rounded-full px-3 py-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <button class="video-control text-white hover:text-yellow-300" onclick="togglePlay()">
                <i id="play-icon" class="fas fa-play"></i>
            </button>
            <button class="video-control text-white hover:text-yellow-300" onclick="toggleMute()">
                <i id="mute-icon" class="fas fa-volume-up"></i>
            </button>
        </div>
        
        <div class="absolute bottom-4 left-4 flex items-center gap-2">
            <span class="bg-yellow-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Danses</span>
            <span class="text-xs text-white bg-black/40 px-2 py-1 rounded">Vidéo</span>
        </div>
    </div>
    <div class="p-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-music text-yellow-700 text-xl"></i>
            </div>
            <h3 class="font-bold text-2xl text-green-800">Danses Traditionnelles</h3>
        </div>
        <p class="text-gray-600 mb-6">Danses rituelles, cérémonielles et festives exprimant l'identité culturelle des différentes ethnies.</p>
        <a href="{{ route('front.contenus') }}?categorie=danses" 
           class="inline-flex items-center gap-2 text-green-700 hover:text-green-900 font-semibold group-hover:gap-3 transition-all">
            Découvrir les danses
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</div>

@push('scripts')
<script>
function togglePlay() {
    const video = document.getElementById('dance-video');
    const icon = document.getElementById('play-icon');
    
    if (video.paused) {
        video.play();
        icon.classList.remove('fa-play');
        icon.classList.add('fa-pause');
    } else {
        video.pause();
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
    }
}

function toggleMute() {
    const video = document.getElementById('dance-video');
    const icon = document.getElementById('mute-icon');
    
    video.muted = !video.muted;
    icon.classList.toggle('fa-volume-up');
    icon.classList.toggle('fa-volume-mute');
}

// Démarrer la vidéo automatiquement au survol
document.querySelectorAll('.group').forEach(card => {
    const video = card.querySelector('video');
    
    card.addEventListener('mouseenter', () => {
        if (video && video.paused) {
            video.play();
        }
    });
    
    card.addEventListener('mouseleave', () => {
        if (video && !video.paused) {
            video.pause();
            video.currentTime = 0;
        }
    });
});
</script>
@endpush

        <!-- Carte Patrimoine -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 group">
            <div class="h-48 bg-cover bg-center relative overflow-hidden">
                <img src="{{ asset('/adminLTE/img/monument.webp') }}" 
                     alt="Patrimoine Bénin" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Patrimoine</span>
                </div>
            </div>
            <div class="p-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-landmark text-red-700 text-xl"></i>
                    </div>
                    <h3 class="font-bold text-2xl text-green-800">Patrimoine</h3>
                </div>
                <p class="text-gray-600 mb-6">Sites historiques classés UNESCO, monuments et lieux sacrés préservant la mémoire collective.</p>
                <a href="{{ route('front.contenus') }}?categorie=patrimoine" 
                   class="inline-flex items-center gap-2 text-green-700 hover:text-green-900 font-semibold group-hover:gap-3 transition-all">
                    Visiter le patrimoine
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION LANGUE & RÉGIONS -->
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Langues -->
            <div>
                <h2 class="text-3xl font-bold text-green-900 mb-6">Langues Locales</h2>
                <p class="text-gray-600 mb-8">Le Bénin compte plus de 50 langues parlées, reflet de sa diversité culturelle.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm border hover:shadow-md transition">
                        <div class="font-bold text-green-700">Fon</div>
                        <div class="text-sm text-gray-500">Sud, Centre</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm border hover:shadow-md transition">
                        <div class="font-bold text-green-700">Yoruba</div>
                        <div class="text-sm text-gray-500">Sud-Est</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm border hover:shadow-md transition">
                        <div class="font-bold text-green-700">Bariba</div>
                        <div class="text-sm text-gray-500">Nord</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm border hover:shadow-md transition">
                        <div class="font-bold text-green-700">Dendi</div>
                        <div class="text-sm text-gray-500">Nord-Est</div>
                    </div>
                </div>
                <a href="{{ route('front.contenus') }}?categorie=langues" 
                   class="inline-block mt-6 text-green-700 hover:text-green-900 font-semibold">
                    <i class="fas fa-language mr-2"></i>Découvrir les langues
                </a>
            </div>
            
            <!-- Régions -->
            <div>
                <h2 class="text-3xl font-bold text-green-900 mb-6">Régions du Bénin</h2>
                <p class="text-gray-600 mb-8">12 régions aux identités culturelles uniques à explorer.</p>
                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-700">12</div>
                            <div class="text-gray-600">Régions</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-yellow-600">77</div>
                            <div class="text-gray-600">Communes</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-red-600">546</div>
                            <div class="text-gray-600">Arrondissements</div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Chaque région offre des spécificités culturelles, historiques et naturelles uniques.</p>
                    <a href="{{ route('front.regions') }}" 
                       class="w-full mt-4 inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition font-semibold">
                        <i class="fas fa-map"></i>
                        Explorer la carte des régions
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION ARTISANAT -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-green-900">Artisanat Béninois</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">Savoir-faire ancestral et créativité contemporaine</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Sculpture -->
        <div class="relative overflow-hidden rounded-xl group h-64">
            <img src="{{ asset('/adminLTE/img/image.benin.jpg') }}" 
                 alt="Sculpture Bénin" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                <div class="text-white">
                    <h3 class="text-xl font-bold mb-2">Sculpture sur bois</h3>
                    <p>Art ancestral des royaumes du Bénin</p>
                </div>
            </div>
        </div>
        
        <!-- Tissage -->
        <div class="relative overflow-hidden rounded-xl group h-64">
            <img src="{{ asset('/adminLTE/img/amazone.png') }}" 
                 alt="Tissage Bénin" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                <div class="text-white">
                    <h3 class="text-xl font-bold mb-2">Tissage de pagnes</h3>
                    <p>Textiles traditionnels aux motifs symboliques</p>
                </div>
            </div>
        </div>
        
        <!-- Poterie -->
        <div class="relative overflow-hidden rounded-xl group h-64">
            <img src="{{ asset('/adminLTE/img/talon.jpeg') }}" 
                 alt="Poterie Bénin" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                <div class="text-white">
                    <h3 class="text-xl font-bold mb-2">Poterie traditionnelle</h3>
                    <p>Vases et objets utilitaires en terre cuite</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-8">
        <a href="{{ route('front.contenus') }}?categorie=artisanat" 
           class="inline-flex items-center gap-2 px-6 py-3 border-2 border-green-700 text-green-700 rounded-lg hover:bg-green-700 hover:text-white transition font-semibold">
            <i class="fas fa-hands"></i>
            Découvrir tout l'artisanat
        </a>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carousel functionality
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    let currentSlide = 0;
    const slideCount = slides.length;
    let slideInterval;

    // Function to show a specific slide
    function showSlide(index) {
        // Reset all slides and indicators
        slides.forEach(slide => {
            slide.style.opacity = '0';
        });
        indicators.forEach(indicator => {
            indicator.classList.remove('bg-white');
            indicator.classList.add('bg-white/50');
        });
        
        // Show current slide and indicator
        slides[index].style.opacity = '100';
        indicators[index].classList.remove('bg-white/50');
        indicators[index].classList.add('bg-white');
        
        currentSlide = index;
    }

    // Next slide
    function nextSlide() {
        let nextIndex = (currentSlide + 1) % slideCount;
        showSlide(nextIndex);
    }

    // Previous slide
    function prevSlide() {
        let prevIndex = (currentSlide - 1 + slideCount) % slideCount;
        showSlide(prevIndex);
    }

    // Initialize carousel
    function initCarousel() {
        // Show first slide
        showSlide(0);
        
        // Auto-slide every 5 seconds
        slideInterval = setInterval(nextSlide, 5000);
        
        // Event listeners for buttons
        prevBtn.addEventListener('click', () => {
            clearInterval(slideInterval);
            prevSlide();
            slideInterval = setInterval(nextSlide, 5000);
        });
        
        nextBtn.addEventListener('click', () => {
            clearInterval(slideInterval);
            nextSlide();
            slideInterval = setInterval(nextSlide, 5000);
        });
        
        // Event listeners for indicators
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                clearInterval(slideInterval);
                showSlide(index);
                slideInterval = setInterval(nextSlide, 5000);
            });
        });
    }

    // Start carousel
    initCarousel();
    
    // Pause carousel on hover
    const carouselContainer = document.querySelector('.carousel-container');
    if (carouselContainer) {
        carouselContainer.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        carouselContainer.addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    }
});
</script>
@endpush

@push('styles')
<style>
.carousel-slide {
    transition: opacity 1s ease-in-out;
}

/* Animation pour les cartes */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.grid > div {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.grid > div:nth-child(1) { animation-delay: 0.1s; }
.grid > div:nth-child(2) { animation-delay: 0.2s; }
.grid > div:nth-child(3) { animation-delay: 0.3s; }
.grid > div:nth-child(4) { animation-delay: 0.4s; }
.grid > div:nth-child(5) { animation-delay: 0.5s; }
.grid > div:nth-child(6) { animation-delay: 0.6s; }

/* Responsive */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }
    
    .hero p {
        font-size: 1.2rem;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-buttons a {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }
}
</style>
@endpush
@endsection