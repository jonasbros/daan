@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Administrators</h1>

        <div>
            <div class="waypoint__controls">
                <a href="{{ route('register') }}" class="button is-primary">Add new admin</a>
            </div>     
            
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            Name
                        </th>  
                        <th>
                            Email
                        </th>  
                        <th></th>                 
                    </tr> 
                    @foreach( $users as $user )
                        <tr>                            
                            <td>
                                <a href="{{ route( 'user', array('id' => $user->id) ) }}">{{ $user->name }}</a>    
                            </td>
                            <td>
                                <a href="{{ route( 'user', array('id' => $user->id) ) }}">{{ $user->email }}</a>                                    
                            </td>     
                            <td>
                                <a class="button is-primary" href="{{ route('audit-trail') }}">View Audit Trail</a>        
                            </td>
                        </tr>
                    @endforeach                   
                </table>   
            </div>                     
        </div>
    </div>
@endsection