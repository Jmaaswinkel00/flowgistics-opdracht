
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="mb-10">
        <a href="{{route('create_artikel')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "> Nieuw artikel maken </a>
        <a href="{{route('pickorder_home')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "> pickorder </a>
    </div>


    <div class="columns-3">
        @foreach ($artikelen as $artikel)
            <div class="content-start mb-5">

                <h3 class="mb-2"> {{$artikel->artikel_code}} </h3>

                <a href="{{route('read_artikel', $artikel->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> show </a>
                <a href="{{route('edit_artikel', $artikel->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> edit </a>
                <a href="{{route('delete_artikel', $artikel->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> delete </a>
            </div>
        @endforeach
    </div>
</body>
</html>
