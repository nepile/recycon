@extends('template.app')

@section('content')
    <section class="container-fluid">
        <div class="row justify-content-center mt-5" style="height: 100vh">
            <div class="col-xl-9">
                <div class="card">
                    <form action="{{ url('/change_password_handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h5 class="mb-4" style="color: #285185; font-weight: bold">Change Password</h5>
                            <div class="mt-2">
                              <label for="current_password">Old Password</label>
                              <input type="password" placeholder="Enter your Old Password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password"> 
                              @error('current_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mt-3">
                              <label for="password">New Password</label>
                              <input type="password" placeholder="Enter your New Password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"> 
                              @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mt-3">
                              <label for="password_confirmation">New Password Confirmation</label>
                              <input type="password" placeholder="Enter your New Password Confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation"> 
                              @error('password_confirmation')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            
                            <button class="btn text-light mt-4" type="submit" style="background: #285185">Update</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection