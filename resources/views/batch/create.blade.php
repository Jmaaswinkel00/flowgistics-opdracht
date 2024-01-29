
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css') --}}
</head>
<body>


    <div class="">

        <form method="POST" action="{{ route('store_batch') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <div>


                <label> Bij welk artikel hoort deze batch: </label>
                <select name="artikelId">

                    @foreach ($artikelen as $artikel)
                    <option value="{{$artikel->id}} "> {{$artikel->artikel_code}} </option>
                        @if(($artikel->id == $selected_artikel->id))
                            <option value="{{$artikel->id}} " selected> {{$artikel->artikel_code}} </option>
                        @endif

                    @endforeach
                </select>
            </div>

            <div>
                <label> Batch code: </label>
                <input name="batchCode">
            </div>

            <div>
                <label> voorraad: </label>
                <input name="voorraad" type="number">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
