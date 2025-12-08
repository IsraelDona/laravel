@extends('frontend.layout')

@section('title', 'Contact - Culture Bénin')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl md:text-4xl font-bold text-green-900 mb-2">Contactez-nous</h1>
    <p class="text-gray-600 mb-8">Nous sommes à votre écoute pour toute question ou suggestion</p>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Informations de contact -->
        <div>
            <div class="bg-gray-50 rounded-xl p-8 mb-8">
                <h2 class="text-2xl font-bold text-green-800 mb-6">Informations de contact</h2>
                
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Adresse</h3>
                            <p class="text-gray-600">Ministère de la Culture<br>Cotonou, Bénin</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Téléphone</h3>
                            <p class="text-gray-600">+229 XX XX XX XX<br>Lun - Ven, 8h - 17h</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">Email</h3>
                            <p class="text-gray-600">contact@culturebenin.bj<br>support@culturebenin.bj</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Réseaux sociaux -->
            <div>
                <h3 class="text-xl font-bold text-green-800 mb-4">Suivez-nous</h3>
                <div class="flex gap-4">
                    <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center hover:bg-pink-700 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Formulaire de contact -->
        <div>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-green-800 mb-6">Envoyez-nous un message</h2>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Nom complet</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 mb-2 font-medium">Sujet</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 mb-2 font-medium">Message</label>
                        <textarea rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full px-6 py-4 bg-green-700 text-white font-bold rounded-lg hover:bg-green-800 transition">
                        <i class="fas fa-paper-plane mr-2"></i>Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection