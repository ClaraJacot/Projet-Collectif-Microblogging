<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('users.usersShow')
                    <div class="flex items-center gap-4">
                        @if (Auth::user()->id === $user->id)
                        <a href="{{ route('profile.edit') }}">
                            <x-primary-button>{{ __('Edit') }}</x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->id === $user->id)
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('posts.postsCreate')
            </div>
        </div>
    </div>
</div>
@endif
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @include('posts.postIndex')
            </div>
        </div>
    </div>
</div>
</x-app-layout>