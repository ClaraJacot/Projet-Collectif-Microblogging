<section>
    
      <h1 class="text-center uppercase">Créer un post</h1>
      
      <form method="POST" action="{{ route('postsStore') }}" enctype="multipart/form-data" >
       @csrf 
	   <div class="flex justify-center text-center p-6">
        <p>
			<label for="titre" >Titre</label><br/>
			<textarea class="text-black" type="text" name="titre" value="{{ old('titre') }}"  id="titre" placeholder="Le titre du post" ></textarea>

			<!-- Le message d'erreur pour "title" -->
			@error("titre")
			<div>{{ $message }}</div>
			@enderror
		</p>
	   </div>
		<div class="flex justify-center text-center p-6">
        <p class="m-2 ">
			<label for="texte"  >Contenu</label><br/>
			<textarea class="h-48 text-black" name="texte" id="texte" placeholder="Le contenu du post">{{ old('texte') }}</textarea>
			<!-- Le message d'erreur pour "texte" -->
			@error("texte")
			<div>{{ $message }}</div>
			@enderror
		</p>
	</div>
        <p>
			
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}"  id="user_id">

			<!-- Le message d'erreur pour "title" -->
			@error("user_id")
			<div>{{ $message }}</div>
			@enderror
		</p>

        <div class="p-2 flex justify-center">
        <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
		</div>
      </form>
</section>