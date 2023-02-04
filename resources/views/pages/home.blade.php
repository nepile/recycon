@extends('template.app')

@section('content')
<section class="container-fluid">
    <div class="row justify-content-center align-items-center p-0" style="height: 80vh; background-image: url('{{ asset('img/banner.jpg') }}'); background-size:100%">
        <div class="col-xl-4 d-flex flex-column">
            <h1 class="text-center" style="font-weight: bold;">
                RECYCON SHOP
            </h1>
            <button onclick="document.location.href='/show_product'" class="btn btn-light">Show Product</button>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <h2 class="text-center text-success">- About Us -</h2>

        <div class="col-10 col-xl-10 p-4 mt-3" style="border: 2px dashed purple">
            <p class="text-center mb-0">
                We are a shop for buying recycle things and second hand thing
            </p>
        </div>
    </div>
</section>
@endsection