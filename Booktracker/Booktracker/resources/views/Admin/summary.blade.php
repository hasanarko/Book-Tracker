@extends('Admin.adminLayout')

@section('user_fullname')
    {{session('admin')->admin_fullname}}
@endsection

@section('summary_page')
    active
@endsection

@section('content')
    <h1 id="page-heading">Summary</h1>
    <hr>
    <div class="">
        <h2 class="table-header">User Information</h2>
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <th scope="col">Number of Total User</th>
              <td>{{$totalNumberofUser}}</td>
            </tr>
            <tr>
              <th scope="col">Number of Total Active User</th>
              <td>{{$numberOfActiveUser}}</td>
            </tr>
            <tr>
              <th scope="col">Number of Total Block User</th>
              <td>{{$numberOfBlockUser}}</td>
            </tr>
          </tbody>
          <tbody>
        </table>

        <h2 class="table-header">Book Information</h2>
        <table class="table table-bordered table-hover">
          <tbody>
            <tr class="bg-info">
              <th scope="col">Number of Total Book</th>
              <td>{{$totalNumberofBook}}</td>
            </tr>
            <tr>
              <th scope="col">Science fiction</th>
              <td>{{$allBook[0]}}</td>
            </tr>
            <tr>
              <th scope="col">Drama</th>
              <td>{{$allBook[1]}}</td>
            </tr>

            <tr>
              <th scope="col">ActionandAdventure</th>
              <td>{{$allBook[2]}}</td>
            </tr>
            <tr>
              <th scope="col">Romance</th>
              <td>{{$allBook[3]}}</td>
            </tr>

            <tr>
              <th scope="col">Mystery</th>
              <td>{{$allBook[4]}}</td>
            </tr>
            <tr>
              <th scope="col">Horror</th>
              <td>{{$allBook[5]}}</td>
            </tr>

            <tr>
              <th scope="col">Guide</th>
              <td>{{$allBook[6]}}</td>
            </tr>
            <tr>
              <th scope="col">Health</th>
              <td>{{$allBook[7]}}</td>
            </tr>

            <tr>
              <th scope="col">Travel</th>
              <td>{{$allBook[8]}}</td>
            </tr>
            <tr>
              <th scope="col">Children</th>
              <td>{{$allBook[9]}}</td>
            </tr>
            <tr>
              <th scope="col">Religion, Spirituality, New Age</th>
              <td>{{$allBook[10]}}</td>
            </tr>
            <tr>
              <th scope="col">Science</th>
              <td>{{$allBook[11]}}</td>
            </tr>
            <tr>
              <th scope="col">History</th>
              <td>{{$allBook[12]}}</td>
            </tr>
            <tr>
              <th scope="col">Math</th>
              <td>{{$allBook[13]}}</td>
            </tr>
            <tr>
              <th scope="col">Poetry</th>
              <td>{{$allBook[14]}}</td>
            </tr>
            <tr>
              <th scope="col">Encyclopedias</th>
              <td>{{$allBook[15]}}</td>
            </tr>
            <tr>
              <th scope="col">Comics</th>
              <td>{{$allBook[16]}}</td>
            </tr>
            <tr>
              <th scope="col">Art</th>
              <td>{{$allBook[17]}}</td>
            </tr>
            <tr>
              <th scope="col">Journals</th>
              <td>{{$allBook[18]}}</td>
            </tr>
            <tr>
              <th scope="col">Biographies</th>
              <td>{{$allBook[19]}}</td>
            </tr>
            <tr>
              <th scope="col">Prayerbooks</th>
              <td>{{$allBook[20]}}</td>
            </tr>
            <tr>
              <th scope="col">Fantasy</th>
              <td>{{$allBook[21]}}</td>
            </tr>
          </tbody>
          <tbody>
        </table>


    </div>
    <!-- /.row -->
@endsection
