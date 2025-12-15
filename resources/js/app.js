import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// Assurez-vous que l'accès au storage est autorisé
try {
    if (window.localStorage) {
        // Votre code de stockage ici
    }
} catch (e) {
    console.warn('LocalStorage non disponible dans ce contexte:', e);
}