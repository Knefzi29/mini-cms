# Session 04 - Défi x-page-header

@props déclare title (obligatoire) et subtitle (par défaut null) : oui 

@props(['title', 'subtitle' => null])

Le paragraphe ne s'affiche que si subtitle est fourni : oui 
 @if ($subtitle)
        <p class="mt-2 text-gray-600">{{ $subtitle }}</p>
    @endif

Le composant remplace le h1 de a-propos.blade.php et de posts/index.blade.php : oui 
les deux vues utilisent <x-page-header ... /> à la place de leur h1

Aucune URL écrite à la main : oui 
les liens utilisent les routes nommées,exmple:(route('posts.index'))

Sur /posts/archive/2025, quel titre affiche x-page-header, et d'où vient-il ?
Aucun article
Il n'y a pas encore d'article publié.