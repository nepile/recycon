@extends('template.app')

@section('content')
<section class="container-fluid" style="height: 100vh">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-11 p-0 col-xl-3 bg-warning border border-1 border-primary" style="height: 73vh;">
            <img src="{{ asset('img/image_product/'.$product->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="col-11 col-xl-6 p-4 border border-1 border-primary" style="height: 73vh">
            <h5>{{ $product->name }}</h5>
            <hr class="divider">

            <div class="mt-2">
                <p style="font-weight: 700">Category:</p>
                <input type="text" class="form-control p-0" value="{{ ucfirst($product->category) }}" style="border: 0;">
                <hr class="divider">
            </div>
            <div class="mt-2">
                <p style="font-weight: 700">Price:</p>
                <input type="text" class="form-control p-0" value="IDR. {{ number_format($product->price, 0, ',', '.') }}" style="border: 0;">
                <hr class="divider">
            </div>
            <div class="mt-2">
                <p style="font-weight: 700">Description:</p>
                <input type="text" class="form-control p-0" value="{{ $product->description }}" style="border: 0;">
                <hr class="divider">
            </div>

            @auth
                @if(auth()->user()->roles == 'customer')
                <form action="/add_cart_handle" method="POST">
                    <div class="row">
                        <div class="col-xl-3 d-flex flex-column align-items-center">
                            @csrf
                                <span>Qty:</span>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror ms-2" value="1">
                                @error('quantity')
                                <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-xl-3 d-flex">
                            <input type="hidden" name="item_id" value="{{ $product->item_id }}">
                            <button type="submit" class="btn btn-warning">Add to cart</button>
                        </div>
                    </div>
                    </form>
                @endif
            @else
            <div class="mt-2">
                <a href="{{ route('login') }}" class="btn btn-warning">Login to buy</a>
            </div>
            @endauth
        </div>
    </div>
</section>
@endsection
