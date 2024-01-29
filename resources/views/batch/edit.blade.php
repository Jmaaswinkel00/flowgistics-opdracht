
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css') --}}
</head>
<body>


    <div class="">

        <form method="POST" action="{{ route('update_batch') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <div>
                {{-- kleine shortcut om het id mee te sturen --}}
                <input name="id" value="{{$batch->id}}"  hidden>


                <label> Artikel code: {{$batch->artikel->artikel_code}} </label>

            </div>

            <div>
                <label> Batch code: </label>
                <input name="batch_code" value="{{$batch->batch_code}}">
            </div>

            <div>
                <label> voorraad: </label>
                <input name="voorraad" value="{{$batch->voorraad}}" type="number">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>
