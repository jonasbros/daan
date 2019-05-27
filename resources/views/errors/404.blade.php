@extends('layouts.admin-dashboard')

@section('content')
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">{{ $exception->getMessage() }}</h1>  
    </div>

@endsection