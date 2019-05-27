@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">{{ $route[0]->name }}</h1>
        <h2></h2>

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="{{ $route[0]->path }}"        
        />     
    </div>
@endsection