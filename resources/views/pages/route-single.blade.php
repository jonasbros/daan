@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        @if( $data['route']->deleted == 1 )
            <h2 class="is-size-4 has-text-weight-bold">Archive</h2>
        @endif

        <h1 class="is-size-2 has-text-weight-bold">{{ $data['route']->name }}</h1>       

        @if( $data['route']->deleted == 1 && \Auth::user()->role == 'admin:1' )
        <div>
            <a href="{{ route('route_archive_restore', array('id' => $data['route']->id) ) }}" class="button is-primary">Restore route</a>
        </div>
        @endif

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="{{ $data['route']->path }}"
        routeid="{{ $data['route']->id }}"     
        userrole="{{ $data['user_role'] }}"   
        />     
    </div>
@endsection