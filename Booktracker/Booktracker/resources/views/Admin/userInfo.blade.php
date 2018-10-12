@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection


@section('want_to_read_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">User Information</h1>
    <hr>
    <div class="">

        <div id="msg_padding">
            @include('Include.error')
        </div>

        <div id="msg_padding2">
            @if($user->user_status == 'active')
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Block User</button>
            @else
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Make Active</button>
            @endif
        </div>


        <table class="table table-bordered">
            <tr>
                <th>User Full Name</th>
                <td>{{$user->user_fullname}}</th>
            </tr>
            <tr>
                <th>Username</th>
                <td>{{$user->user_name}}</th>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{$user->user_password}}</th>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$user->user_city}}</th>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$user->user_address}}</th>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user->user_email}}</th>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$user->user_phone}}</th>
            </tr>
            <tr>
                <th>User Status</th>
                <td>{{$user->user_status}}</th>
            </tr>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure want to block ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('requestBlockUser')}}">
                    @csrf
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">User : {{$user->user_fullname}} </label>
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Block</button>
                    </div>
                </form>
              </div>

            </div>
          </div>
        </div>

    </div>
    <!-- /.row -->
@endsection
