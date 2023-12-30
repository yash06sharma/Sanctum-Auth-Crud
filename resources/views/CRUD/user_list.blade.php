@extends('Layout.dashboard_layout')


@section('body')


<div class="row">
    <div class="col-sm-6 mt-2">
        <h5 class="alert alert-primary">Edit the user</h5>
        <form  id="form">
            <input type="hidden" class="form-control" name="sid" id="sid" value="">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                  <input
                  type="text" class="form-control" name="name" id="name" value="">
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
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control" name="password" id="password">
                  <div class="error"></div>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="type" id="type" value="">
                  <div class="error"></div>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="status" id="status" value="">
                  <div class="error"></div>
                </div>
              </div>

                <button type="submit" class="btn btn-primary register">Update</button>

                    <div class="msg"></div>


           </form>

    </div>
    <div class="col-sm-6 mt-2">
        <h5 class="alert alert-primary">List Data</h5>
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody  class="user">

            </tbody>
          </table>
    </div>
</div>
@endsection

@section('script')

{{-- <script type="text/javascript" src="{{ asset('assets/js/logout.js')}}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/js/userdata.js')}}"></script>


@endsection


