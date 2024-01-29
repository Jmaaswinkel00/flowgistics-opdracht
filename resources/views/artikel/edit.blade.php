
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css') --}}
</head>
<body>


    <div class="">

        <form method="POST" action="{{ route('update_artikel') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <div>
                {{-- kleine shortcut om het id mee te sturen --}}
                <input name="id" value="{{$artikel->id}}" hidden>
            <div>
                <label> artikel nummer: </label>
                <input name="artikelCode" value="{{$artikel->artikel_code}}">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
