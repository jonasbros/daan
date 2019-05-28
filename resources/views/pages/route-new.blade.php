@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">

        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    <label for="route-new__name">
                        Name: 
                        <input type="text" name="route_name" id="route-new__name" class="input" form="waypoints-form" required>
                    </label>
                    {{-- needs style --}}
                    <div class="route-new__errors">
                        @if( $errors->any() )
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" form="waypoints-form" class="button is-primary">Save</button>
                </div>    
            </div>
            
            <mapbox 
            waypointslist="true"
            routes="''"        
            />   

        </div>
    </div>
@endsection