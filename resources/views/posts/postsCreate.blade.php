<section>
    
      <h1 class="text-center uppercase">Créer un post</h1>
      
      <form method="POST" action="{{ route('postsStore') }}" enctype="multipart/form-data" >
       @csrf 
	   <div class="flex justify-center text-center p-6">
        <p>
			<label for="titre" >Titre</label><br/>
			<textarea class="text-black" type="text" name="titre" value="{{ old('titre') }}"  id="titre" placeholder="Le titre du post" ></textarea>


		</p>
	   </div>
	   <div class="flex flex-col justify-center text-center p-6">
	   
		<label for="picture">Image</label><br/>
		<input class="text-opacity-1" type="file" name="picture" id="picture" >

		<!-- Le message d'erreur pour "picture" -->
		@error("picture")
		<div>{{ $message }}</div>
		@enderror
	
	   </div>
		<div class="flex justify-center text-center p-6">
        <p class="m-2 ">
			<label for="texte"  >Contenu</label><br/>
			<textarea class="h-48 text-black" type="text" name="texte" value="{{ old('texte') }}"  id="texte" placeholder="Le contenu du post"></textarea>

		</p>
	</div>
        <p>
			
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}"  id="user_id">

			
		</p>

        <div class="p-2 flex justify-center">
			<x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>		
		</div>
      </form>
</section>