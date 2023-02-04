@if($id_page != 8 && $id_page != 7 && $id_page != 3)
<footer class="container-fluid mt-5 d-none d-xl-inline-block">
    <div class="row p-3 bottom-0 position-relative" style="background: #285185;">
        @php
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y');
        @endphp
        <p class="mb-0 text-center text-light">
            &copy; {{ $date }} Copyright Recycon
        </p>
    </div>
</footer>
@endif