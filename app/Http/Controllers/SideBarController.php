<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SideBarController extends Controller
{
    public function __invoke()
    {
        $fonctions = Admin::where('fonction', 'admin')->get();

        return view('sideBar.sidebar', compact('fonctions'));
    }
}
