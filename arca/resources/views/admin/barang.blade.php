@extends('admin.layouts.footer')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
            <br />
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
            @endif
        </div>
    </section>
</div>
@endsection