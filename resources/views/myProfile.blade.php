<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-none md:grid-cols-3 lg:grid-cols-3 justify-center">
<div class="flex flex-col col-span-1 justify-center max-w-screen-sm mx-auto sm:px-6 lg:px-8"> 
    <div class="py-12 flex justify-center">
        <div class="w-96 mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('users.usersShow')
                    <div class="pt-6 flex items-center justify-center gap-4">
                        @if (Auth::user()->id === $user->id)
                        <a href="{{ route('profile.edit') }}">
                            <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->id === $user->id)
<div class="flex justify-center">
    <div class="w-96 mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('posts.postsCreate')
            </div>
        </div>
    </div>
</div>
@endif
</div>

<div class="py-12 col-span-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('posts.postIndex')
            </div>
        </div>
    </div>
</div>
</div>

</x-app-layout>