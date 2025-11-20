<x-layout>
    <p>Bienvenue sur la page d'accueil !</p>

    <div 
        class="mt-4 w-fullbg-white rounded-xl shadow"
        x-data="{
            open: false,
            }"
    >
        <button 
            type="button" 
            class="btn btn-primary w-full" 
           x-on:click="open = !open"
        >
        Titre de l'accordéon</button>
        <div
            x-show="open"
            x-collapse
        >
            <div 
                class="p-3" 
            >
                Contenu de l'accordéon
            </div>
        </div>
    </div>
</x-layout>