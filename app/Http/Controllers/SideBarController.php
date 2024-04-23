<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SideBarController extends Controller
{
    public function __invoke()
    {
        $fonctions = Auth::user();

        return view('sideBar.sidebar', compact('fonctions'));
    }
}
