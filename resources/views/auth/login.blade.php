@extends('layouts.auth')
@section('form')
<div class="mb-4">
    <h3>E-Arsip SENA</h3>
</div>
{{-- Error Alert --}}
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<form action="{{ route('proses_login') }}" method="post">
    @csrf
    <div class="form-group first">
        <label for="username">Usernmae</label>
        <input type="text" class="form-control" name="username" id="email" style="height: 35px;">
        @if($errors->has('username'))
        <span class="error">{{ $errors->first('username') }}</span>
        @endif
    </div>
    <div class="form-group last mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" style="height: 35px;">
        @if($errors->has('password'))
        <span class="error">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="d-flex mb-5 align-items-center">
        <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
            <input type="checkbox" checked="checked" />
            <div class="control__indicator"></div>
    </div>

    <input type="submit" value="Log In" class="btn btn-block btn-primary" style="height: 40px;">
</form>
@endsection