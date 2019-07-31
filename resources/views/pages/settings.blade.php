@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">

        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>
            
           

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    {{-- route name --}}
                     <form id="test-form" action="/api/fetch" method="POST">
                        @csrf   
                        
                        <label for="route-new__name">
                            Name: 
                            <input type="text" name="name" id="route-new__name" class="input" required>
                        </label> 
                        
                        <button type="submit" class="button is-primary">Save</button>
                    </form>                             
                </div>    
            </div>
        </div>
    </div>
@endsection