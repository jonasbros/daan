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
    private $isSuccess = false;

    public function route(Request $request, $search) {
        
        $route = Route::where('name', 'like', '%' . $search . '%')->first();
        
        if( empty($route) ) {
            $tag = Tag::where('tag', 'like', '%' . $search . '%')->first();
            $route = Route::find($tag->route_id);
        }
        
        if( !empty($route) ) {        
           $this->isSuccess = true;
        }

        return response()->json(
            [
                'success' => $this->isSuccess,
                'route'   => $route
            ],            
            $this->successStatus
        );
    }
}