@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">{{ $route[0]->name }}</h1>
        <h2></h2>
        
        <div class="mapbox__container">
            <div id="mapbox__inner"></div>
        </div>        
    </div>
@endsection