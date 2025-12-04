<x-layout>
    <div class="w-[80%] mx-auto py-10">

        <x-recipes.header_recipe :recipe="$recipe" />
        <x-recipes.body :recipe="$recipe" />
        <x-recipes.footer_recipe :recipe="$recipe" />

    </div>
</x-layout>
