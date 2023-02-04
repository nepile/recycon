@extends('template.app')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center mt-5" style="height: 100vh">
            <div class="col-xl-9">
                <div class="card">
                    <form action="{{ url('/edit_profile_handle/'.auth()->user()->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h5 class="mb-4" style="color: #285185; font-weight: bold">Edit Profile</h5>
                            <div class="mt-2">
                              <label for="username">New Username</label>
                              <input type="username" placeholder="Enter your username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ auth()->user()->username }}"> 
                              @error('username')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mt-3">
                              <label for="email">New Email</label>
                              <input type="text" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ auth()->user()->email }}"> 
                              @error('email')
                                 <span class="text-danger">{{ $message }}</span> 
                              @enderror
                            </div>
                            
                            <button class="btn text-light mt-4" style="background: #285185">Update</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection