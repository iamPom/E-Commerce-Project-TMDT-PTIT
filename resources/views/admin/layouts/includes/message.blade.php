@if (isset($errors) && $errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
@if (session()->get('flash_warning'))
    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
        {{ session()->get('flash_warning') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->get('flash_success'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{ session()->get('flash_success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

