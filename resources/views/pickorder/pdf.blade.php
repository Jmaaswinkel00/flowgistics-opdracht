<!doctype html>
<html>
<head>
  <meta charset="utf-8">

</head>
<body>


   <div class="">

        <p> Totale hoeveelheid nodig: {{$totalAmount}}</p>
        <table class="table-fixed">
            <thead>
                <tr>
                    <th class=""> Batch code </th>
                    <th class=""> Oude Voorraad </th>
                    <th class=""> Nieuwe Voorraad </th>
                    <th class="px-4 py-2 text-emerald-600"> voorraad gebruikt: </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($batchesUsed as $batch)
                <tr>
                    <td class=""> {{$batch['batch_code']}} </td>
                    <td class=""> {{$batch['voorraad'] + $batch['amountUsed']}} </td>
                    <td class=""> {{$batch['voorraad']}} </td>
                    <td class=""> {{$batch['amountUsed']}} </td>
                </tr>
            @endforeach
            </tbody>

        </table>


    </div>
</body>
</html>
