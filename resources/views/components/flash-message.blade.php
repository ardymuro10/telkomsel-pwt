@if (session()->has('success'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Notifikasi!</h5>
    <p class="mb-0">{!! session('success') !!}</p>
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Perhatian!</h5>
    <p class="mb-0">{!! session('success') !!}</p>
</div>
@endif

@if ($errors->any())
{{-- <div>
    @foreach ($errors->all() as $error)
    [{{ $error }}],
    @endforeach
</div> --}}
@endif
