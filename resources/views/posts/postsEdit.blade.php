<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update your post') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Post information") }}
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <form method="POST" action="{{ route('postsUpdate', ["id" => $post->id] )}}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="titre" :value="__('Title')" />
        <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre', $post->titre)" required autofocus autocomplete="titre" />
        <x-input-error class="mt-2" :messages="$errors->get('titre')" />
    </div>
    <div>
        <span>Image actuelle</span><br/>
		<img src="{{ asset('storage/'.$post->picture) }}"/>
        <label for="picture" :value="__('Image')" />
        <input id="picture" name="picture" type="file" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('texte')" />
    </div>
    <div>
        <x-input-label for="texte" :value="__('Contenu')" />
        <x-text-input id="texte" name="texte" type="text" class="mt-1 block w-full" :value="old('texte', $post->texte)" required autofocus autocomplete="texte" />
        <x-input-error class="mt-2" :messages="$errors->get('texte')" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form> 
                </div>
            </div>
        </div>
    </div>

</x-app-layout>