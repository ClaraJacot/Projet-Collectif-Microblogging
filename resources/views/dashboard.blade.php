<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between items-center ">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Actualités') }}
        </h2>
        
        <button class="bg-gray-900 text-white font-bold py-2 px-4 rounded m-4 dark:bg-gray-200 dark:text-gray-800" onclick="location.href='{{ route('myProfile', ['id'=>Auth::user()->id]) }}'">Créer un post</button>
        </div>
    </x-slot>

    <div class="py-12">
       
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center px-8 mx-8 text-gray-900 dark:text-gray-100">
                    Bienvenue {{Auth::user()->name}}
                </div>
            </div>
    
    </div>

    @include('posts.postIndex')

             
</x-app-layout>
