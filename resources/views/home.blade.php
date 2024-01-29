
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="mb-10">
        <a href="/artikel/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "> Nieuw artikel maken </a>
        <a href="/pickorder" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "> pickorder </a>
    </div>


    <div class="columns-3">
        @foreach ($artikelen as $artikel)
            <div class="content-start mb-5">

                <h3 class="mb-2"> {{$artikel->artikel_code}} </h3>

                <a href="/artikel/read/{{$artikel->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> show </a>
                <a href="/artikel/edit/{{$artikel->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> edit </a>
                <a href="/artikel/delete/{{$artikel->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> delete </a>
            </div>
        @endforeach
    </div>
</body>
</html>
