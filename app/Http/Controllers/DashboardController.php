<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show() {

        if( !Auth::user() ) {
            return redirect('/');
        }
        return view('pages.dashboard');
    }
}
