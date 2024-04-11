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
			<label for="user_id" >numéro du user</label><br/>
			<input type="number" name="user_id" value="{{ old('user_id') }}"  id="user_id" placeholder="Le numéro du user" >

			<!-- Le message d'erreur pour "title" -->
			@error("user_id")
			<div>{{ $message }}</div>
			@enderror
		</p>
        
        <input type="submit" name="valider" value="Valider" >
      </form>
</section>