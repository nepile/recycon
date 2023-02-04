@extends('template.app')

@section('content')
<section class="container-fluid">

    <div class="row p-3">
        <h4 class="mt-3" style="font-weight: bold">{{ $title }}</h2>
        
        @include('components.alert')

        @if ($count_transaction == false)
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                    <p class="text-center mb-0">The transaction is empty</p>
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
                        <th>Date</th>
                        <th>Receiver Name</th>
                        <th>Receiver Address</th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;    
                    @endphp

                    @foreach ($transactions as $item)    
                        <tr style="white-space: nowrap;">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->date_checkout }}</td>
                            <td>{{ $item->receiver_name }}</td>
                            <td>{{ $item->receiver_address }}</td>
                            <td>
                                <img src="{{ asset('img/image_product/'.$item->image) }}" style="width: 20%" alt="">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>IDR. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>IDR. {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="8"><strong>Grand Total</strong></td>
                        <td>IDR. {{ number_format($price_total[0] * $quantity_total, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        @endif
    </div>
</section>

@endsection