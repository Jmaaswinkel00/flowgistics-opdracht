
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- @vite('resources/css/app.css') --}}
</head>
<body>


    <div class="">

        <form method="POST" action="{{ route('store_artikel') }}">
            @csrf <!-- {{ csrf_field() }} -->
            <div>
                <label> Artikel nummer:  </label>
                <input name="artikelCode">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</body>


