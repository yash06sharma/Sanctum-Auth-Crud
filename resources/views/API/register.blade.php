@extends('Layout.admin_layout')

@section('title')
    Register
@endsection


@section('body')

<form action="" id="form">

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name" id="name" value="">
          <div class="error"></div>
        </div>
      </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="email" id="email" value="">
          <div class="error"></div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="password" id="password">
          <div class="error"></div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
      <div class="msg"></div>

</form>

@endsection


@section('script')
<script type="text/javascript" src="{{ asset('assets/js/register.js')}}"></script>
@endsection

