@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p class="mb-0">{{ session('error') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p class="mb-0">{{ session('success') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('info'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <p class="mb-0">{{ session('info') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif (session()->has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p class="mb-0">{{ session('warning') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif