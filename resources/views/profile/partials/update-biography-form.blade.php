<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update biography') }}
        </h2>
    </header>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="biography" :value="__('Biography')" />
                <x-text-input id="biography" name="biography" type="text" class="mt-1 block w-full" :value="old('biography', $user->biography)" required autofocus autocomplete="biography" />
                <x-input-error class="mt-2" :messages="$errors->get('biography')" />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
    
                @if (session('status') === 'biography-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
    </form>
</section>