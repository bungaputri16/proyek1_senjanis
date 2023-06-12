@extends('layouts.layout')

@section('content')
<div class="divWrapper">
    <div class="mainMain">
        {{-- <div class="col-md-8"> --}}
            {{-- <div class="form"> --}}
                <div class="h2"><div class="login2">{{ __('Login') }}</div></div>

                {{-- <div class="card-body"> --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="namaLengkap2">
                            <label for="email" class="label2"><div class="email">{{ __('Email') }}</div></label>

                            <div class="span">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        
                        <div class="namaLengkap3">
                            <label for="password" class="label3"><div class="kataSandi">{{ __('Kata Sandi') }}</div></label>
                            <div class="span2">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br>
                        {{-- <div class="row mb-3"> --}}
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                {{-- <div class="belumPunyaAkunBuatSekarang">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="label4" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        
                        {{-- <div class="row mb-0"> --}}
                            <div class="form">
                                <button type="submit" class="button"><div class="login">
                                    {{ __('Login') }}
                                </div>  
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="lupaKataSandi" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="belumPunyaAkunBuatSekarang">
                                <p class="labelWrapper">
                                  <span class="label4">Belum Punya Akun?</span>
                                  <a class="" href="{{ route('register') }}">
                                    <span class="label5">Buat Sekarang</span></a>
                                </p>
                              </div>
                        {{-- </div> --}}
                    </form>
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
</div>
@endsection
