<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier un post') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Informations du post") }}
        </p>
        <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="location.href='{{ route('myProfile', ['id'=>Auth::user()->id]) }}'">{{ __('Annuler') }}</button>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    
                   <form method="POST" action="{{ route('postsUpdate', ["id" => $post->id] )}}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="titre" :value="__('Titre')" />
        <x-text-input id="titre" name="titre" type="text" class="mt-1 block w-full" :value="old('titre', $post->titre)" required autofocus autocomplete="titre" />
        <x-input-error class="mt-2" :messages="$errors->get('titre')" />
    </div>
    <div class=" flex flex-col justify-start p-2 ">
        <span>Image actuelle</span><br/>
		<img class="flex justify-start h-96 w-auto" src="{{ asset('storage/'.$post->picture) }}"/>
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
                <button class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'" onclick="location.href='{{ route('myProfile', ['id'=>Auth::user()->id]) }}'">{{ __('X') }}</button>

            </div>
        </div>
    </div>

</x-app-layout>