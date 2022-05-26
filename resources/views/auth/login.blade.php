@extends('layouts.app')

@section('content')
       <div class="box-form">
            <div class="w-full max-w-xs">
                <div class="block-title">
                    <h2>Iniciar sesión</h2>
                </div>
                <div class="block-divisor">
                    <div class="links-login">
                        <a href="" class="text-blue-800"><img src="{{asset('img/logo-google.png')}}" alt=""></a>
                        <a href="" class="text-blue-800"><img src="{{asset('img/logo-linkedin.png')}}" alt=""></a>
                    </div>
                    <span>o inicia con</span>
                </div>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        {{ __('Correo electrónico') }}
                        </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Nombre">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        {{ __('Contraseña') }}
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" required autocomplete="current-password" placeholder="Cédula">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="flex items-center justify-between">
                    <button class="border-rounde-8 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ __('Siguiente') }} <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                     @if (Route::has('register'))
                    No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-800 font-bold">{{ __('Regístrate') }}</a>
                     @endif
                </p>
            </div>
        </div> 

@endsection