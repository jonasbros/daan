<?php

namespace App\Http\Controllers\API;

use App\Route;
use App\Tag;
use App\helpers\AuditTrail;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller {
    public $successStatus = 200;
    
    public function fetch(Request $request) {        
        return response()->json(['success' => $request->name], $this->successStatus);
    }
}