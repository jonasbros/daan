@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">{{ $data['route']->name }}</h1>
        <h2></h2>

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="{{ $data['route']->path }}"
        routeid="{{ $data['route']->id }}"     
        userrole="{{ $data['user_role'] }}"   
        />     
    </div>
@endsection