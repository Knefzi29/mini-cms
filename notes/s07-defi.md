# Session 07 - Défi : articles de la même catégorie

La section « Dans la même catégorie » apparaît sous un article publié qui a une catégorie : oui show() ne la construit que si $post->category
L'article affiché n'apparaît pas dans sa propre section : oui dans le code (->where('id', '!=', $post->id))
Un brouillon de la même catégorie n'apparaît pas : oui Le scope published() l’écarte, et assertDontSee('Voisin brouillon')
La page s'ouvre sans LazyLoadingViolationException : oui à condition que x-post-card n’utilise que user, category et tags. Ce sont les trois relations que vous chargez. Le test ne le prouve que si Model::preventLazyLoading()
Le nouveau test passe et php artisan test est vert : oui 

Combien de requêtes SQL charge la section, et pourquoi pas une par carte 
4 requêtes
Les articles publiés de la catégorie, sans l’article courant, limités à 3.
Les auteurs, avec un seul WHERE id IN (...).
Les catégories, avec un seul WHERE id IN (...).
Les tags, avec une jointure sur post_tag et un seul WHERE post_id IN (...)