<section>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center uppercase text-4xl text-gray-800 dark:text-gray-200 ">
      POSTS
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-2 m-2 items-center justify-center">
    @foreach ($posts as $post)
    <div class=" p-4 m-6  flex flex-col rounded-lg justify-between shadow-xl bg-white dark:bg-gray-800 overflow-hidden"> 
        <div class="  flex flex-col relative"> 
          <div class="p-6 text-gray-900 dark:text-gray-100 flex-grow">
            <h3 class="font-bold text-lg text-center p-6 uppercase">{{ $post->titre}}</h3>
          <div class=" flex justify-center p-2">
            <svg width="200px" height="200px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M964.751 210.302H61.963c-25.57 0-46.296 20.727-46.296 46.296v6.518c0 25.57 20.727 46.297 46.296 46.297h902.788c25.569 0 46.297-20.727 46.297-46.297v-6.518c0-25.57-20.728-46.296-46.297-46.296z" fill="#4A5699" /><path d="M964.751 828.887H61.963c-25.57 0-46.296 20.728-46.296 46.297v6.52c0 25.565 20.727 46.297 46.296 46.297h902.788c25.569 0 46.297-20.731 46.297-46.297v-6.52c0-25.57-20.728-46.297-46.297-46.297z" fill="#C45FA0" /><path d="M68.564 210.302h-6.601c-25.57 0-46.296 20.727-46.296 46.296v625.105c0 25.565 20.727 46.297 46.296 46.297h6.601c25.571 0 46.296-20.731 46.296-46.297V256.598c0-25.57-20.725-46.296-46.296-46.296zM964.751 210.302h-6.604c-25.569 0-46.292 20.727-46.292 46.296v625.105c0 25.565 20.723 46.297 46.292 46.297h6.604c25.569 0 46.297-20.731 46.297-46.297V256.598c0-25.57-20.728-46.296-46.297-46.296z" fill="#6277BA" /><path d="M155.907 396.561a49.6 49.555 0 1 0 99.2 0 49.6 49.555 0 1 0-99.2 0Z" fill="#F0D043" /><path d="M739.108 111.191H284.412c-25.567 0-46.296 20.727-46.296 46.296v6.518c0 25.568 20.729 46.297 46.296 46.297h454.696c25.569 0 46.293-20.729 46.293-46.297v-6.518c0-25.569-20.723-46.296-46.293-46.296z" fill="#F39A2B" /><path d="M607.586 569.65c0.037 55.423-41.429 99.896-95.959 102.036-55.394 2.173-99.965-43.03-102.043-95.958-1.141-29.074-23.423-53.393-53.392-53.393-28.241 0-54.535 24.293-53.392 53.393 4.438 113.048 94.812 202.82 208.826 202.742 113.141-0.08 202.821-98.092 202.742-208.82-0.049-68.858-106.832-68.862-106.782 0z" fill="#F39A2B" /><path d="M411.073 564.357c1.049-54.399 44.634-97.98 99.036-99.029 54.426-1.049 98.01 46.207 99.028 99.029 1.326 68.771 108.109 68.9 106.783 0-2.19-113.543-92.271-203.625-205.812-205.813-113.539-2.188-203.694 95.569-205.819 205.813-1.328 68.901 105.458 68.771 106.784 0z" fill="#E5594F" /></svg>
         </div>
            <p class="p-0 md:p-4 lg:p-4 text-center flex flex-grow items-center justify-center">{{ $post->texte }}</p>

          </div>        

        </div>           
        <div class="absolute text-gray-900 dark:text-gray-100"> 
                <a href="{{ route('myProfile',["id" => $post->user_id]) }}" class="underline">{{$post->name}} </a>
            </div>           

        @if (Auth::user()->id === $post->user_id)
        <div class="flex items-end mt-4"> 
            <a href="{{ route('postsEdit',["id" => $post->id]) }}" class="mx-2">
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
            </a>
            
          <x-danger-button
              x-data=""
              x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')"
              >{{ __('Delete') }}</x-danger-button>
            
        </div>
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
