<section>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center uppercase text-4xl text-gray-800 dark:text-gray-200 ">
      POSTS
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-2 m-2 items-start justify-center">
    @foreach ($posts as $post)
    <div class=" p-4 m-6  flex flex-col rounded-lg justify-between shadow-xl bg-white dark:bg-gray-800 overflow-hidden"> 
        <div class="  flex flex-col relative"> 
          <div class="p-6 text-gray-900 dark:text-gray-100 flex-grow">
            <h3 class="font-bold text-lg text-center p-6 uppercase">{{ $post->titre}}</h3>
          <div class=" flex justify-center p-2">
           <img src="{{ asset('storage/'.$post->picture)}}">
         </div>
            <p class="p-0 md:p-4 lg:p-4 text-center flex flex-grow items-center justify-center">{{ $post->texte }}</p>
          </div>        

        </div>           
        <div class="absolute text-gray-900 dark:text-gray-100"> 
                <a href="{{ route('myProfile',["id" => $post->user_id]) }}" class="underline">{{$post->name}} </a>
            </div>           

        @if (Auth::user()->id === $post->user_id)
        <div class="flex justify-center mt-4"> 
            <a href="{{ route('postsEdit',["id" => $post->id]) }}" class="mx-2">
                <x-primary-button>{{ __('Modifier') }}</x-primary-button>
            </a>
            
          <x-delete-button :action="route('postsDestroy', $post->id)"/>
          
              
          
        </div>
        @endif
    </div>
    @endforeach
  </div>
  
</section>

