<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
    </head>
    <body>
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
    </body>