<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>

    <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-emerald-50 to-teal-100 p-10">
        <a href="/artikel/edit/{{$artikel->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> edit </a>
        <h3> Artikel nummer: {{$artikel->artikel_code}} </h3>

        <p> Batches:</p>
        <table class="table-fixed">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-emerald-600"> Batch code </th>
                    <th class="px-4 py-2 text-emerald-600"> Voorraad </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($artikel->batches as $batch)
                <tr>
                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> {{$batch->batch_code}} </td>
                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> {{$batch->voorraad}} </td>
                    <td> <a href="/batch/edit/{{$batch->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounde"> edit </a> </td>
                    <td> <a href="/batch/delete/{{$batch->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> delete </a> </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <a href="/batch/create/{{$artikel->id}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Batch toevoegen </a>
    </div>
</body>
</html>
