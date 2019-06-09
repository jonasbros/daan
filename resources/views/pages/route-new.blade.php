@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">

        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    {{-- route name --}}
                    <label for="route-new__name">
                        Name: 
                        <input type="text" name="name" id="route-new__name" class="input" form="waypoints-form" required>
                    </label>
                    {{-- tags --}}
                    <label for="route-add_tags">
                        Tags: 
                      
                    </label>
                    <input type="tags" class="input" name="tags" id="route-add_tags" placeholder="Add tags" form="waypoints-form" value="">
                    {{-- needs style --}}
                    <div class="route-new__errors">
                        @if( $errors->any() )
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>

                    {{-- <button type="submit" form="waypoints-form" class="button is-primary">Save</button> --}}
                </div>    
            </div>
            
            <mapbox 
            waypointslist="true"
            routes="''"        
            controls="true"
            />   

        </div>
    </div>
@endsection