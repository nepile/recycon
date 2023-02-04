@extends('template.app')

@section('content')
<section class="container-fluid" style="height: 100vh">

    <div class="row p-3">
        <h4 class="mt-3" style="font-weight: bold">Manage Item</h2>
        
        @include('components.alert')

        @if ($count_product == false)
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                    <p class="text-center mb-0">The product is empty</p>
                    <p class="text-center"><a href="{{ route('add_item') }}">Add Item Product</a></p>    
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
                        <th>Item ID</th>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Item Description</th>
                        <th>Item Price</th>
                        <th>Item Category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;    
                    @endphp

                    @foreach ($products as $item)    
                        <tr style="white-space: nowrap;">
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->item_id }}</td>
                            <td>
                                <img src="{{ asset('img/image_product/'.$item->image) }}" style="width: 25%">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>IDR. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($item->category) }}</td>
                            <td>
                                <a href="{{ url('/edit_item/'.$item->id) }}" class="btn btn-info text-light">Update</a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#delete'.$item->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    
    @foreach ($products as $item)
    <div class="modal fade" id="{{ 'delete'.$item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ 'delete'.$item->id.'Label' }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5 text-danger" id="{{ 'delete'.$item->id.'Label' }}">Perhatian</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete <strong>{{ $item->name }}</strong> with item ID <strong>{{ $item->item_id }}</strong>?
            </div>
            <div class="modal-footer">
                <form action="{{ url('/delete_item_handle/'.$item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    @endforeach
</section>

@endsection