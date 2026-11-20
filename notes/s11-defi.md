# Session 11 - Défi

/mes-articles ne montre que mes articles, brouillons compris : oui en passant par la relation $request->user()->posts() sans filtrer uniquement sur les articles publiés, vous récupérez tous les articles appartenant à l'utilisateur connecté, y compris ses brouillons, à l'exclusion de ceux des autres auteurs
Un visiteur qui ouvre /mes-articles arrive sur /connexion : oui si la route /mes-articles est protégée par le middleware auth et que la redirection d'authentification pointe vers /connexion
Le cookie remember_web_ apparaît quand la case est cochée : oui lorsque Auth::attempt($credentials, $remember) reçoit un booléen true en second argument et que l'authentification réussit, Laravel génère le cookie « remember me » remember_web_<hash>
Les deux nouveaux tests passent et php artisan test est vert : oui 

Pourquoi partir de $request->user()->posts() plutôt que de Post::where('user_id', $request->user()->id) ?
Vous bénéficiez naturellement des conventions de la relation (et vous pouvez chaîner d'autres méthodes Eloquent comme with(...), latest(), etc.) de façon plus idiomatique dans Laravel. (Note : dans les deux cas, si $request->user() existe, la requête SQL filtrera sur user_id, mais la relation est plus expressive et moins sujette aux fautes de frappe sur le nom de colonne

Pourquoi la case remember ne doit-elle pas être dans le tableau passé à Auth::attempt() ?
utilise le premier tableau comme critères de recherche en base (WHERE) : Le premier argument de Auth::attempt(array $credentials, bool $remember = false) sert à vérifier l'identité de l'utilisateur (ex. email et password). Si vous y glissiez 'remember' => true, Laravel tenterait de chercher une colonne remember dans la table users, ce qui ferait échouer la connexion ou provoquerait une erreur SQL