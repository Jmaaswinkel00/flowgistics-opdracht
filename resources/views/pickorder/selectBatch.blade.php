<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div>
        @if(!empty($error_msg))
        <h2> {{$error_msg}} </h2>
        @endif
        <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-emerald-50 to-teal-100 p-10">
            <h4> We hebben {{$amount}} producten nodig </h4>
            <h3> Artikel nummer: {{$artikel->artikel_code}} </h3>

            <p> Batches:</p>
            <form method="get" action="{{ route('pickorder_calculate') }}">
                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-emerald-600"> Batch code </th>
                            <th class="px-4 py-2 text-emerald-600"> Voorraad </th>
                            <th class="px-4 py-2 text-emerald-600"> Hoeveelheid </th>
                            <th class="px-4 py-2 text-emerald-600"> Beste keuze? </th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- kleine hack om de amount mee te sturen in de calculate functie --}}
                        <input hidden name="amount" value="{{$amount}}">
                        @foreach ($artikel->batches as $batch)
                            <tr>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> {{$batch->batch_code}} </td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> {{$batch->voorraad}} </td>
                                <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium">
                                    <input type="number" name="{{$batch->id}}">
                                </td>
                                @if ($batch == $bestPick)
                                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> ja </td>

                                @else
                                    <td class="border border-emerald-500 px-4 py-2 text-emerald-600 font-medium"> nee </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
            </table>
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>
    </div>
</body>
</html>
