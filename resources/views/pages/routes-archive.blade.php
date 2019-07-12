@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Routes Archive</h1>

        <div>
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            Route
                        </th>            
                    </tr> 
                    @foreach( $routes as $route )                   
                    <tr>                    
                        <td>
                            <a href="{{ route( 'route', array('name' => $route->name) ) }}">
                                {{ $route->name }}
                            </a>                        
                        </td>        
                    </tr>
                    @endforeach
                </table>   
            </div>                     
        </div>
    </div>
@endsection