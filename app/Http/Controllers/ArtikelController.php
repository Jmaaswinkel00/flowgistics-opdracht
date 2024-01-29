<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Artikel;
use App\Models\Batch;
use Illuminate\Http\Request;

class ArtikelController extends BaseController
{
    public function index()
    {
        $artikelen = Artikel::all();

        return view('home', ['artikelen' => $artikelen]);
    }

    public function read($id)
    {
        $artikel = Artikel::find($id);

        return view('artikel.read', ['artikel' => $artikel]);
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(ArtikelRequest $request)
    {
        $artikel = Artikel::create(
            [
                'artikel_code' => $request->artikel_code
            ]
        );

        $artikel->save();

        return redirect('/artikel/read/' . $artikel->id);
    }

    public function edit($artikel_id)
    {
        $artikel = Artikel::where("id", "=", $artikel_id)->first();

        return view('artikel.edit', ['artikel' => $artikel]);
    }

    public function update(ArtikelRequest $request)
    {
        $artikel = Artikel::where("id", "=", $request->id)->first();
        $artikel->artikel_code = $request->artikel_code;
        $artikel->save();

        return redirect('/artikel/read/' . $artikel->id);
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);

        return view('artikel.delete', ['artikel' => $artikel]);
    }

    public function deleteConfirm($id)
    {
        $artikel = Artikel::find($id);

        foreach($artikel->batches as $batch)
        {
            $batch->delete();
        }
        $artikel->delete();

        return redirect('/');
    }
}
