<?php

namespace App\Http\Controllers;

use App\Route;
use App\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = DB::table('routes')
            ->where('deleted', 0)
            ->get();
        return view('pages.routes', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.route-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'name' => 'required|max:72|unique:routes',
            'waypoints_input' => 'required',
        ]);        

        $route = new Route;    
        $route->name = $request->name;
        $route->path = $request->waypoints_input;
        $route->searches = 0;       
        $route->save();
        
        //find how to save relationships. is temporary
        $tags = new Tag();        
        $tags->route_id = $route->id;
        $tags->tag = $request->tags;
        $tags->save();
        
        return redirect('/routes/' . $route->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $route = DB::table('routes')
            ->where('name', $name)
            ->get();

        $role = DB::table('users')
            ->where('id', Auth::id())
            ->pluck('role');

        $data = array(
            'route'     => $route[0],
            'user_role' => $role[0],
        );

        if( $route->count() ) {
            return view('pages.route-single', compact('data'));
        }else {
            abort(404, 'Route Not Found');
            return view('errors.404');
        }       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $route = Route::find($id);
        $route->path = $request->input('waypoints_input');
        $route->save();
        return redirect('/routes/' . $route->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);
        $route->deleted = 1;
        $route->save();
        return redirect('/routes');
    }
}
