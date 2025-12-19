<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class blahController extends Controller
{ 
    public function blah(): View {
        $something_ = "awdsdsa";

        return view('blah', compact('something_'));
    }
}
