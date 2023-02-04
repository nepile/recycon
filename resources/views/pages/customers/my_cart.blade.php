@extends('template.app')

@section('content')
<section class="container-fluid" style="height: 100vh">

    <div class="row p-3">
        <h4 class="mt-3" style="font-weight: bold">{{ $title }}</h2>
        
        @include('components.alert')

        @if ($count_transaction == false)
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                    <p class="text-center mb-0">The cart is empty</p>
                    <p class="text-center"><a href="{{ route('show_product') }}">Let's go shopping</a></p>    
                    <img src="{{ asset('img/ils2.svg') }}" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
            
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-info">
                <thead>
                    <tr style="white-space: nowrap;">
                        <th>No.</th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;    
                    @endphp

                    @foreach ($transactions as $item)    
                        <tr style="white-space: nowrap;">
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('img/image_product/'.$item->image) }}" style="width: 20%" alt="">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>IDR. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>IDR. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ url('/delete_item/'.$item->id_transaction) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h6 style="font-weight: bold;">
                Grand Total: <span class="text-success">IDR. {{ number_format($price_total[0] * $quantity_total, 0, ',', '.') }}</span>
            </h6>

            <div class="card">
                <div class="card-body">
                    <h4 style="color: #285185">Receiver</h4>

                    <form action="/checkout" method="POST">
                        @csrf

                        <div class="mt-2">    
                            <label for="receiver_name">Receiver Name</label>
                            <input type="text" class="form-control" name="receiver_name" id="receiver_name" placeholder="Enter receiver name">
                        </div>

                        <div class="mt-3">
                            <label for="receiver_address">Receiver Address</label>
                            <input type="text" class="form-control" name="receiver_address" id="receiver_address" placeholder="Enter receiver address">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-warning">Checkout ({{ $count_transaction }})</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection