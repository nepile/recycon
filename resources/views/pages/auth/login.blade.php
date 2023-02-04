@extends('template.app')

@section('content')

<section class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 80vh">
        <div class="col-xl-4 mt-3">
            <div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; border: 0">
                <div class="card-body">
                    @auth
                    <div class="col-xl-12">
                        <img src="{{ asset('img/ils1.svg') }}" style="object-fit: cover; height: 100%; width: 100%" alt="">                    
                    </div>
                    <h5 class="text-center" style="font-weight: bold">Kamu sedang login</h5>
                    <p class="text-center">logout terlebih dahulu untuk mendapatkan kembali akses ke halaman ini!</p>
                    
                    @else
                    <h5 style="font-weight: bold">Please Login</h5>
                 
                    @include('components.alert')
                    
                    <form action="{{ route('login_handle') }}" method="POST">
                        @csrf
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
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password anda" id="password">
                            @error('password')
                            <p class="text-danger" style="font-size: 12px">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        

                        <div class="mt-3">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">Remember me</label>
                        </div>

                        <div class="mt-3">
                            <button class="btn text-light" style="width: 100%; background: #285185">Login</button>
                        </div>

                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

@endsection