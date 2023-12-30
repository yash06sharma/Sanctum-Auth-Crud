@extends('Layout.dashboard_layout')

@section('title')
    Dashboard
@endsection


@section('body')


<div class="row">
    <div class="col sm-12">

        <div class="col-sm-12 mt-2">
            <h5 class="alert alert-primary text-center">List Data</h5>
            <table class="table text-center">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody  class="user">

                </tbody>
              </table>
        </div>



    </div>
</div>




@endsection


@section('script')
<script type="text/javascript" src="{{ asset('assets/js/userdashboard.js')}}"></script>
@endsection

