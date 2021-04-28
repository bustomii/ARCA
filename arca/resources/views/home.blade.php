@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($message = Session::get('success'))
                <br />
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ $message }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection