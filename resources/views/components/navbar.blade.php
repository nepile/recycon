<nav class="navbar navbar-expand-lg" style="background: #285185">
    <div class="container-fluid">
      
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}" @if($id_page == 1) style="font-weight: bold; color: orange;" @else style="color: #fff" @endif>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('show_product') }}" @if($id_page == 2) style="font-weight: bold; color: orange;" @else style="color: #fff" @endif>Show Product</a>
          </li>
          
          @if (auth()->user() == true)
            @if (auth()->user()->roles == 'admin')
            <li class="nav-item me-3 dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" @if($id_page == 3 || $id_page == 4) style="font-weight: bold; color: orange;" @else style="color: #fff" @endif>
                Manage Item
              </a>
              <ul class="dropdown-menu w-10" overflow: auto">
                <li><a class="dropdown-item" href="{{ route('view_item') }}" @if($id_page == 3) style="font-weight: bold; color: orange;" @else style="color: #000" @endif>View Item</a></li>
                <li><a class="dropdown-item" href="{{ route('add_item') }}" @if($id_page == 4) style="font-weight: bold; color: orange;" @else style="color: #000" @endif>Add Item</a></li>
              </ul>
            </li>

            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('my_cart') }}" @if($id_page == 8) style="font-weight: bold; color: orange;" @else style="color: #fff" @endif>My Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('transaction_history') }}" @if($id_page == 7) style="color: orange;" @else style="color: #fff" @endif>Transaction History</a>
            </li>
            @endif
          @endif
        </ul>

        @if (auth()->user() == true)
        <form action="/search" method="GET" class="@if(auth()->user()->roles == 'customer') col-xl-6 @else col-xl-7 @endif d-flex @if(auth()->user()->roles == 'customer') me-2 @endif">
          <input type="text" name="search" id="search" value="{{ old('search') }}" class="form-control" placeholder="Search Product...">
          <button type="submit" class="btn btn-warning ms-2">Search</button>
        </form>
        @endif

        @auth
          <ul class="navbar-nav mb-lg-0">
            <li class="nav-item me-1 dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" @if($id_page == 5 || $id_page == 6) style="font-weight: bold; color: orange;" @else style="color: #fff" @endif>
                Profile
              </a>
              <ul class="dropdown-menu w-10" style="overflow: auto">
                <li class="dropdown-item">{{ auth()->user()->username }} {{ '('.  ucfirst(auth()->user()->roles) .')' }}</li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('edit_profile') }}" @if($id_page == 5) style="font-weight: bold; color: orange;" @else style="color: #000" @endif>Edit Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('change_password') }}" @if($id_page == 6) style="font-weight: bold; color: orange;" @else style="color: #000" @endif>Change Password</a></li>
              </ul>
            </li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn border border-light text-light mt-3 mt-xl-0" type="submit">Logout</button>
            </form>
          @else
            <button class="btn border border-light me-2 text-light" onclick="document.location.href='/login'" @if($id_page == 'auth1') style="display: none;" @endif>Login</button>
            <button class="btn border border-light text-light" onclick="document.location.href='/register'" @if($id_page == 'auth2') style="display: none;" @endif>Registrasi</button>  
          </ul>
        @endauth


      </div>
    </div>
  </nav>