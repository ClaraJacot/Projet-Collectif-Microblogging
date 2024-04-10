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
      @csrf
      <h1>Hello world</h1>
      <div>
        @foreach ($posts as $post)
        <p>{{ $post->titre}}</p>
        <p>{{ $post->texte }}</p>
        @endforeach
      </div>
      
    </body>