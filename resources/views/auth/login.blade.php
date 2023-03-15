@extends('layout.layout')
@section('title', 'Iniciar Sesión')
@section('body')
    <section class="vh-100 login-section">
        <div class="container login-header">
            <div class="row">
                <div class="col px-5">
                    <div class="top-container text-center">
                        <img src="{{asset('img/logo-estilo.webp')}}" class="img-fluid logo-estilo" width="100px">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <form class="form-login" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="align-items-center d-flex justify-content-center my-4">
                            <h2 class="login-title text-center mx-3 mb-0">Iniciar Sesión para ver la data de <br> <span>MEGASORTEOS</span></h2>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            {{-- <label class="form-label" for="form3Example3">Email </label> --}}
                            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg cajas-texto"
                                placeholder="Email"
                                value="{{session('cE') ? session('cE'): old('email')}}"/>
                            <span class="error-msg">
                                @error('email') {{$message}} @enderror
                                {{session('error') ? session('error'): ''}}
                            </span>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            {{-- <label class="form-label" for="form3Example4">Password</label> --}}
                            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg cajas-texto"
                                placeholder="Contraseña" />
                            <span class="error-msg">
                                @error('password') {{$message}} @enderror
                                {{session('errorC') ? session('errorC'): ''}}
                            </span>
                        </div>

                        <div class="text-center mt-4 pt-2">
                            <button type="submit" class="btn btn-primary send-registro btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesión</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="section p-3 footer">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{asset('img/logo-papelesa.webp')}}" alt="logo-papelesa">
                </div>
            </div>
        </div>
    </section>
@endsection
