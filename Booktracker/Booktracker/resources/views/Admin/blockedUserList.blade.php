@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection

@section('blocked_user_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">All User List</h1>
    <hr>
    <div class="">

        <div id="msg_padding">
            @include('Include.error')
        </div>

        <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Full Name</th>
                <th scope="col">User Status</th>
                <th scope="col">View Details</th>
                <th scope="col">Action</th>
            </tr>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->user_fullname}}</td>
                        <td> {{$user->user_status}} </td>
                        <td> <a href="{{route('showUserInfo', ['id'=> $user->user_id])}}" class="btn btn-success">Show</a> </td>
                        <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$key}}" data-whatever="@getbootstrap">Make Active</button> </td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure want to unblock ?</h5>
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
                                  <button type="submit" class="btn btn-primary">Unblock</button>
                                </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>

                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.row -->
@endsection
