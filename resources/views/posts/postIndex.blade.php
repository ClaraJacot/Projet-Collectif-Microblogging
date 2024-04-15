<section>
  <div class="p-6 uppercase text-xl text-gray-800 dark:text-gray-200 text-center">
      POSTS
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 px-6 m-6 items-center justify-center">
    @foreach ($posts as $post)
    <div class="m-6 p-6 flex flex-col justify-between h-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg flex flex-col h-full">
          <div class="p-6 text-gray-900 dark:text-gray-100 flex-grow">
            <h3 class="font-bold text-lg text-center p-2 uppercase">{{ $post->titre}}</h3>
            <img class="justify-center">
            <p class="p-4 text-center flex flex-grow">{{ $post->texte }}</p>
            <div  class="text-right p-4"><a href="{{ route('myProfile',["id" => $post->user_id]) }}" class="underline">{{$post->name}} </a> </div>
          </div>
        </div>
        @if (Auth::user()->id === $post->user_id)
        <a href="{{ route('postsEdit',["id" => $post->id]) }}">
        <x-primary-button>{{ __('Edit') }}</x-primary-button>
        </a>
        <a>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')"
            >{{ __('Delete') }}</x-danger-button>
        </a>
    <x-modal name="confirm-post-deletion" focusable>
      <form action="{{ route('postsDestroy',["id" => $post->id]) }}" method="post" class="p-6">
        @csrf
        @method('DELETE')
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
          {{ __('Are you sure you want to delete your post?') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your post is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
        <div class="mt-6 flex justify-end">
          <x-secondary-button x-on:click="$dispatch('close')">
              {{ __('Cancel') }}
          </x-secondary-button>
          <x-danger-button class="ms-3">
              {{ __('Delete Post') }}
          </x-danger-button>
        </div>
    </form>
  </x-modal>
        @endif
    </div>
    @endforeach
</div>
</section>