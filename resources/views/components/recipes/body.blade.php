@props(['recipe'])

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="flex flex-col gap-8">
        <x-recipes.show_all_ingredient :recipe="$recipe" />
        <x-recipes.instructions :recipe="$recipe" />
    </div>

    <div class="flex flex-col gap-8">
        <x-recipes.show_picture :recipe="$recipe" />
        <x-recipes.description :recipe="$recipe" />
    </div>
</div>
