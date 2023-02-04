@extends('template.app')

@section('content')

<section class="container-fluid" style="height: 85vh">
    <div class="row justify-content-center position-relative">
        <div class="col-xl-8 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 style="font-weight: bold; color: #285185">Add New Item</h5>
                    
                    <form action="{{ route('add_item_handle') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between" style="row-gap: 14px">
                            <div class="col-xl-3">
                                <label for="item_id" style="font-weight: 600">Item ID</label>
                                <input type="text" name="item_id" id="item_id" class="form-control @error('item_id') is-invalid @enderror" value="{{ old('item_id') }}" placeholder="Enter Item ID">
                                @error('item_id')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-3">
                                <label for="price" style="font-weight: 600">Item Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price"  id="price" placeholder="Enter Item Price">
                                @error('price')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-3">
                                <label for="category" style="font-weight: 600">Item Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                                    <option value="">-Choose One-</option>
                                    <option value="recycle" @if(old('category') == "recycle") {{ 'selected' }} @endif>Recycle</option>
                                    <option value="second" @if(old('category') == "second") {{ 'selected' }} @endif>Second</option>
                                </select>
                                @error('category')
                                    <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-6 mt-3">
                            <label for="name" style="font-weight: 600">Item Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Enter Item Name">
                            @error('name')
                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label for="description" style="font-weight: 600">Item Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Item Description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-xl-4 mt-3">
                            <label for="image" style="font-weight: 600">Image File Upload</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn text-light mt-4" style="background: #285185">Add Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection