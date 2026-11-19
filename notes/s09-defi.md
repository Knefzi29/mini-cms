# Session 09 - Défi

Le bandeau s'affiche sur toutes les pages quand SITE_READ_ONLY=true : oui la condition vérifie bien la config/env dans le layout principal, ex.
Le bandeau disparaît quand SITE_READ_ONLY=false : oui lorsque la variable/configuration est à false, le bloc conditionnel Blade ne s'affiche pas
La page Article introuvable propose au plus trois articles publiés, sans brouillon : oui le rendu de la page 404 / introuvable récupère les suggestions via Post::published()->latest('published_at')->take(3)->get()
Aucune LazyLoadingViolationException sur /posts/999 : oui à condition d'avoir chargé anticipé les relations nécessaires avec ->with('user', 'category', 'tags') sur la requête des articles proposés, même lorsque la collection est vide ou contient jusqu'à 3 articles
Les deux nouveaux tests passent et php artisan test est vert : oui 

Pourquoi le bandeau est-il dans le layout et pas dans chaque vue ?
Cohérence visuelle et maintenance : Si vous modifiez le texte, le style ou la condition d'affichage du bandeau, vous n'avez qu'un seul endroit à mettre à jour, et sa position reste identique d'une page à l'autre.
Pourquoi le test du bandeau n'a-t-il pas besoin de modifier .env ?
Isolation de l'environnement de test : Modifier .env pendant les tests modifierait votre configuration locale/développement et risquerait de polluer d'autres tests ou votre dépôt.