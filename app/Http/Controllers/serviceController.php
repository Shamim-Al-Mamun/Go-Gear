<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function serviceIndex()
    {
        return view('services.service');
    }
}
