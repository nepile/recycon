@extends('template.app')

@section('content')
    <section class="container-fluid" style="height: 80vh">
        <div class="row p-3">
            @include('components/alert')
            @if ($count_product == false)
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center mb-0">The product is empty</p>
                            @if (auth()->user() == true)
                                @if (auth()->user()->roles == 'admin')
                                    <p class="text-center"><a href="{{ route('add_item') }}">Add Item Product</a></p>
                                @endif
                            @endif    
                            <img src="{{ asset('img/ils2.svg') }}" width="100%">
                        </div>
                    </div>
                </div>
            </div>

            @else
            <h3 class="mt-3 text-center" style="font-weight: bold">Our Products</h3>
            <div class="row mt-3" style="row-gap: 14px">
                @foreach ($products as $item)
                <div class="col-xl-4 mt-3 mt-xl-0">
                    <div class="card" style="border-radius: 0; border: 1px solid yellow">
                        <div class="card-body p-0">
                            <div class="col-xl-12 bg-danger" style="height: 25vh">
                                <img src="{{ asset('img/image_product/'.$item->image) }}" style="width: 100%; height: 100%; object-fit: cover" alt="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex mb-2 justify-content-between align-items-center">
                                <p class="mb-0" style="font-weight: 600; font-size: 20px">
                                    {{ $item->name }}
                                </p>
                                <span>
                                    {{ ucfirst($item->category) }}
                                </span>
                            </div>
                            <p>
                                IDR. {{ number_format($item->price, 0, ',', '.') }}
                            </p>

                            <a href="{{ url('/detail_product/'.$item->id) }}" class="btn btn-warning mb-2" style="font-size: 14px">Detail Product</a>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
            @endif
            
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $products->links() }}
        </div>
    </section>
@endsection