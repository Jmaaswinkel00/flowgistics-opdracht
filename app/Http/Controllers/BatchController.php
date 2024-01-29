<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Batch;
use App\Models\Artikel;
use Illuminate\Http\Request;

class BatchController extends BaseController
{
    public function create($artikel)
    {
        $artikelen = Artikel::all();

        if(!empty($artikel))
        {
            $selected_artikel = Artikel::where("id", "=", $artikel)->first();
            return view('batch.create', ['artikelen' => $artikelen, 'selected_artikel' => $selected_artikel]);
        }

        return view('batch.create', ['artikelen' => $artikelen]);
    }

    public function store(BatchRequest $request)
    {
        Batch::create(
            [
                'artikel_id' => $request->artikel_id,
                'batch_code' => $request->batch_code,
                'voorraad'   => $request->voorraad
            ]
        );

        return redirect('/');
    }

    public function edit($batch_id)
    {
        $batch = Batch::where("id", "=", $batch_id)->first();

        return view('batch.edit', ['batch' => $batch]);
    }

    public function update(BatchRequest $request)
    {
        $batch = Batch::where("id", "=", $request->id)->first();
        $batch->batch_code = $request->batch_code;
        $batch->voorraad = $request->voorraad;
        $batch->save();

        return redirect('/artikel/read/' . $batch->artikel->id);
    }

    public function delete($id)
    {
        $batch = Batch::where("id", "=", $id)->first();
        $artikelId = $batch->artikel->id;
        $batch->delete();

        return redirect('/artikel/read/' . $artikelId);
    }
}
