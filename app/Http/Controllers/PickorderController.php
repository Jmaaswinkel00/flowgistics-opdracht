<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Artikel;
use App\Models\Batch;
use App\Models\Pickorder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class PickorderController extends BaseController
{

    public function index()
    {
        $artikelen = Artikel::all();


        return view('pickorder.home', ['artikelen' => $artikelen]);
    }

    public function selectBatch(Request $request)
    {
        $artikel = Artikel::findOrFail($request->artikel_id);

        $bestPick = Batch::where('artikel_id', '=', $artikel->id)
                            ->where('voorraad', '>', $request->amount)
                            ->orderBy('voorraad', 'asc')
                            ->first();


        return view('pickorder.selectBatch', ['artikel' => $artikel, 'amount' => $request->amount, 'bestPick' => $bestPick]);
    }

    public function calculate(Request $request)
    {
        $selected_amount = 0;
        foreach($request->all() as $key => $amountToPick)
        {
            if($key !== "amount")
            {
                $batch = Batch::findOrFail($key);

                if($batch->voorraad < $amountToPick)
                {
                    return view('pickorder.selectBatch', ['
                        artikel' => $batch->artikel,
                        'amount' => $request->amount,
                        'error_msg' => 'Je hebt meer producten opgegeven dan dat er voorraad is']);
                }
                $selected_amount += $amountToPick;
            }
        }

        if($selected_amount > $request->amount)
        {
            return view('pickorder.selectBatch', [
                'artikel' => $batch->artikel,
                'amount' => $request->amount,
                'error_msg' => 'Je hebt meer producten opgegeven dan dat er nodig is!']);
        }

        $pickorderID = $this->finalizePickorder($request);

        return to_route('pickorder_downloadPDF', $pickorderID);
    }

    private function finalizePickorder(Request $request)
    {
        $batchesUsed = [];
        foreach($request->all() as $key => $amountToPick)
        {
            if($key !== "amount" && $amountToPick > 0)
            {
                $batch = Batch::findOrFail($key);
                $batch->voorraad -= $amountToPick;
                $batch->save();

                $batch->amountUsed = $amountToPick;

                array_push($batchesUsed, $batch);
            }

        }
        $pickorder = new Pickorder;
        $pickorder->hoeveelheid = $request->amount;
        $pickorder->batches = $batchesUsed;
        $pickorder->save();

        return $pickorder->id;
    }

    public function downloadPDF($id)
    {
        $pickorder = Pickorder::findOrFail($id);

        $pdf = Pdf::loadView('pickorder.pdf', ['batchesUsed' => $pickorder->batches, 'totalAmount' => $pickorder->hoeveelheid]);

        return $pdf->download('pickorderlijst_' . $pickorder->id . '.pdf');
    }
}
