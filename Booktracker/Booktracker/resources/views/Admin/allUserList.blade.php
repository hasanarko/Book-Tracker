@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection

@section('userlist_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">All User List</h1>
    <hr>
    <div class="">

        <!-- Search Option-->
        <form class="row" method="post" action="{{route('searchUser')}}">
            @csrf
          <div class="form-group col-10">
            <input type="text" name="userName" class="form-control" placeholder="Search User">
          </div>
          <div class="col-2">
              <button type="submit" class="btn btn-outline-info btn-block">Search</button>
          </div>
        </form>

        <div id="msg_padding">
            @include('Include.error')
        </div>

        <table class="table table-bordered table-sm table-hover">
            <tr>
                <th scope="col">#</th>
                <th scope="col" class="make_text_center">User Full Name</th>
                <th scope="col" class="make_text_center">User Email </th>
                <th scope="col" class="make_text_center">User Status</th>
                <th scope="col" class="make_text_center">View Details </th>
            </tr>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->user_fullname}}</td>
                        <td>{{$user->user_email}}</td>
                        <td class="make_text_center">{{$user->user_status}} </td>
                        <td class="make_text_center"><a href="{{route('showUserInfo', ['id'=> $user->user_id])}}" class="btn btn-success">Show</a> </td>
                    </tr>



                @endforeach
            </tbody>
        </table>

    </div>
    <!-- /.row -->
@endsection
