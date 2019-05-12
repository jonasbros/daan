@extends('layouts.app')

@section('content')
<section class="section register-section">
    <div class="container">       
        <div class="register-form__container">            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="is-size-3 has-text-weight-bold">Add new admin</h1>

                @if( \Session::get('success') )
                <article class="message is-success">
                    <div class="message-header">
                        <p>{{ \Session::get('success') }}</p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                </article>
                @endif

                <div class="name__container">                    
                    <input
                        type="text"
                        class="input @error('name') is-danger @enderror"
                        name="name" value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="email__container">
                    <input
                        type="email"
                        class="input @error('email') is-danger @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="Email Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="password__container">
                    <input
                        type="password"
                        class="input @error('password') is-danger @enderror"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>        

                <div class="password-confirm__container">
                    <input
                        type="password"
                        class="input"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password">
                </div>

                <div class="role__container">
                    <div class="select is-primary">                        
                        <select 
                            name="role"
                        >
                            <option value="">Select Level</option>
                            <option value="admin:1">1</option>
                            <option value="admin:2">2</option>                            
                        </select>
                    </div>

                    <p>
                        <small>Admin Level 1 = Super admin</small>
                    </p>
                </div>

                <div class="button__container">
                    <button type="submit" class="button is-primary is-medium">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
