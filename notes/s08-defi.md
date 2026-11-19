# Session 08 - Défi

La route posts.tag utilise {tag:slug} : oui Dans routes/web.php
La page d'un tag n'affiche ni brouillon ni article d'un autre tag : oui PostController::byTag(Tag $tag) part de $tag->posts()
Les tags des cartes sont des liens : oui  Dans resources/views/components/post-card.blade.php
L'accueil n'affiche que les tags qui ont au moins un article publié : oui PageController::home() compte uniquement les articles publiés withCount(['posts' => fn (Builder $query) => $query->published()])
Les trois nouveaux tests passent et php artisan test est vert : oui 

Pourquoi filtrer les tags vides après get() plutôt que d'afficher (0) ?
Éviter l'encombrement visuel et les liens inutiles : Un tag sans article publié (par exemple un tag nouvellement créé ou lié uniquement à des brouillons) n'a aucun contenu public à afficher sur /posts/tag/{slug}. Le masquer garde la section « Tags populaires » propre et pertinente pour les visiteurs.
Combien de requêtes ajoute la liste des tags populaires, et pourquoi pas une par tag ?
Elle ajoute 1 seule requête SQL (en plus des requêtes déjà nécessaires pour les derniers articles et les catégories).
? Parce que Laravel utilise withCount(['posts' => fn (Builder $query) => $query->published()]). Au lieu d'exécuter une requête séparée pour chaque tag (ce qui créerait un problème de requêtes N+1), Eloquent calcule le compte agrégé (COUNT(*)) directement dans la requête principale sur la table tags via une sous-requête corrélée sur la table pivot post_tag et la table posts, hydratant automatiquement l'attribut posts_count sur chaque modèle Tag.