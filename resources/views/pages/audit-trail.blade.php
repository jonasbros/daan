@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Audit Trail</h1>

        <div>
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            History
                        </th>            
                    </tr> 
                    @foreach( $data as $data )                   
                    <tr>                    
                        <td>
                            <a href="{{ $data->link }}">
                                {{ $data->name . ' ' . $data->action . ' ' . $data->what }}
                            </a>                        
                        </td>        
                    </tr>
                    @endforeach
                </table>   
            </div>                     
        </div>
    </div>
@endsection