<section>
  <div class="px-25" >
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Tous les posts
    </h2>
  </div>
   
    <div class="grid grid-cols-2 gap-4 py-6">
    @foreach ($posts as $post) 
    <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="font-bold text-lg">{{ $post->titre}}</h3>
          <p>{{ $post->texte }}</p> 
          <a href="{{ route('myProfile',["id" => $post->user_id]) }}">
            <p>{{$post->name}} </p>
          </a>
        </div> 
      </div>
      @if (Auth::user()->id === $post->user_id)
      <a href="{{ route('postsEdit',["id" => $post->id]) }}">
      <x-primary-button>{{ __('Edit') }}</x-primary-button>
      </a>
      @endif
    </div>
  @endforeach  
</div>

</section>