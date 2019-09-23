<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Passport\HasApiTokens;

class AxiosStuff extends Controller
{
    //new route province and city
    public function RouteProvinceCities($id) {
        $cities = Province::find($id)->cities;

        echo json_encode($cities);
    }
}
