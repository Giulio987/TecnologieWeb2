@if(session('success'))
<div class="container-lg mt-5" align="center">
    <div class="row alert alert-success alert-error" role="alert">
        <p style="text-align:center">{{ session('success') }}</p>
    </div>
</div>
@endif

@if(session('error'))
<div class="container-lg mt-5" align="center">
    <div class="row alert alert-danger alert-error pt-3" role="alert">
        <p style="text-align:center">{{ session('error') }}</p>
    </div>
</div>
@endif