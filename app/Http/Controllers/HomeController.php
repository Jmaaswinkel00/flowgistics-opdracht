<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Artikel;

class HomeController extends BaseController
{

    public function index()
    {
        return view('home');
    }


}
