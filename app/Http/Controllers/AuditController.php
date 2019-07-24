<?php

namespace App\Http\Controllers;

use App\Audit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    
    public function index() {
        $data = Audit::all();
        
        return view('pages.audit-trail', compact('data'));
    }
}
