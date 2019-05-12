@extends('layouts.app')

@section('content')
<section class="section login-section">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="login-form__container">
                    <h1 class="__title has-text-centered is-size-2 has-text-weight-bold">DaanPH Admin</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="email__container">
                            <input 
                                type="email"
                                class="input @error('email') is-dannger @enderror" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus
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
                                autocomplete="current-password"
                                placeholder="Password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="checkbox__container">
                            <input 
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
        
                                <label class="checkbox" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                        
                        
                        <div class="button__container">
                            <button 
                                type="submit"
                                class="button is-primary is-medium">
                                {{ __('Login') }}
                            </button>
        
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>                        
    
                    </form>
                </div>

                
            </div>
        </div>
        
    </div>
</section>
@endsection
