@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p class="mb-2">{{ $message }}</p>
    </div>
@endif