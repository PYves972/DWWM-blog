**\*\*\*\***\*\***\*\*\*\***exercice 1**\*\*\*\***\*\***\*\*\*\***
Lorsque je lance la commande "php artisan", il s'affiche la version de Laravel, la syntaxe d'utilisation globale, les options globales, ainsi que la liste complète de toutes les commandes disponibles classées par familles. C'est une sorte d'aide-mémoire qui permet de retrouver le nom exact d'une commande ou d'explorer les fonctionnalités du CLI quand on en a besoin.
Exemples de familles de commandes : make: (génération de squelettes de code) ; migrate: (gestion des migrations et de la base de données) ; route: (gestion et affichage des routes du projet)
La commande "php artisan make:model --help" affiche toutes les options disponibles pour make:model. L'option -m permet de générer automatiquement le fichier de migration qui est associé au modèle. La commande à taper pour voir l'ensemble des routes définies dans un projet est : php artisan route:list : List all registered routes

**\*\*\*\***\*\***\*\*\*\***exercice 2**\*\*\*\***\*\***\*\*\*\***
Ce qui s'affiche lorsque je lance la commande pour démarrer le serveur :
PS C:\dev\dwwm-blog> php artisan serve

INFO Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server

Dans mon navigateur, j'arrive sur la page d'accueil Laravel
Chaque fois que je rafraichis la page dans le navigateur, la date et l'heure sont actualisées dans le terminal.

Il n'est pas possible de taper d'autres commandes dans le terminal pendant que le serveur tourne.
La solution est d'ouvrir un autre terminal en parallèle.
Pour arrêter le serveur, il faut faire Ctrl+C
