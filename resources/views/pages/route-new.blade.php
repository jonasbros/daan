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

                    {{-- city province --}}
                    <div class="route-cp__container columns">
                        <div class="column is-half">
                            {{-- Province --}}
                            <label for="route-province">
                                Province: 
                            
                            </label>
                            <select class="input" name="province" id="route-province" placeholder="Province" form="waypoints-form" value="" onchange="getCities(this.value)">
                                <option value="">Select Province</option>

                                @foreach( $provinces as $province )
                                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="column is-half">
                             {{-- City --}}
                            <label for="route-city">
                                City / Municipality: 
                            
                            </label>
                            <select class="input" name="city" id="route-city" placeholder="City" form="waypoints-form" value="">
                                <option value="">Select City</option>
                            </select>                
                        </div>                          
                    </div>{{-- route-cp__container --}}
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
            ref="new_route_mapbox"
            />   

        </div>
    </div>
@endsection