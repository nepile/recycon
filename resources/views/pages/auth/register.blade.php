@extends('template.app')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="@auth col-xl-4 @else col-xl-5  @endauth mt-3">
            <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; border: 0">
                <div class="card-body">
                    @auth
                    <div class="col-xl-12">
                        <img src="{{ asset('img/ils1.svg') }}" style="object-fit: cover; height: 100%; width: 100%" alt="">                    
                    </div>
                    <h5 class="text-center" style="font-weight: bold">Kamu sedang login</h5>
                    <p class="text-center">logout terlebih dahulu untuk mendapatkan kembali akses ke halaman ini!</p>
                    
                    @else
                    <h5 class="mb-0" style="font-weight: bold">Register Form</h5>
                    <hr class="divider">

                    <form action="{{ route('register_handle') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Your username" id="username" value="{{ old('username') }}">
                            @error('username')
                            <p class="text-danger" style="font-size: 12px">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="example@gmail.com" id="email" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-danger" style="font-size: 12px">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="mt-3">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Your password" id="password">
                            @error('password')
                            <p class="text-danger" style="font-size: 12px">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="mt-3">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" placeholder="Confirm Password" id="confirm_password">
                            @error('confirm_password')
                            <p class="text-danger" style="font-size: 12px">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        
                        <div class="mt-3">
                            <button class="btn btn-dark" style="width: 100%;">Register Now</button>
                        </div>

                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

@endsection