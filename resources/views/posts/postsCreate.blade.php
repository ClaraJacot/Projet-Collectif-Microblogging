<section>
    
      <h1>Make a post</h1>
      
      <form method="POST" action="{{ route('postsStore') }}" enctype="multipart/form-data" >
       @csrf 
        <p>
			<label for="titre" >Titre</label><br/>
			<input type="text" name="titre" value="{{ old('titre') }}"  id="titre" placeholder="Le titre du post" >

			<!-- Le message d'erreur pour "title" -->
			@error("titre")
			<div>{{ $message }}</div>
			@enderror
		</p>
        <p>
			<label for="texte" >Contenu</label><br/>
			<input type="text" name="texte" value="{{ old('texte') }}"  id="texte" placeholder="Le contenu du post" >

			<!-- Le message d'erreur pour "texte" -->
			@error("texte")
			<div>{{ $message }}</div>
			@enderror
		</p>
        <p>
			
			<input type="hidden" name="user_id" value="{{Auth::user()->id}}"  id="user_id">

			<!-- Le message d'erreur pour "title" -->
			@error("user_id")
			<div>{{ $message }}</div>
			@enderror
		</p>
        
        <x-primary-button>{{ __('Save') }}</x-primary-button>
      </form>
</section>