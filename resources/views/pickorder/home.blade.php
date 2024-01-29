
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css') --}}
</head>
<body>
    <form method="get" action="{{ route('pickorder_select') }}">
        @csrf <!-- {{ csrf_field() }} -->
    <div class="columns-3">
        <label> Pick order maken voor: </label>
        <select name="artikel_id">
            @foreach ($artikelen as $artikel)
                <option value="{{$artikel->id}} "> {{$artikel->artikel_code}} </option>
            @endforeach
        </select>
    </div>
    <div>
        <label> Hoeveel producten zijn er nodig: </label>
        <input name="amount" type="number">
    </div>

    <button type="submit" class="btn btn-primary">Volgende</button>
</form>

</body>
</html>
