@if($errors->any())
    <br>
    @foreach($errors->all() as $err)
    <div>
        <p class="alert alert-danger">{{$err}}</p>
    </div>
    @endforeach
@endif

@if(session('error_message'))
    <div>
        <p class="alert alert-danger">{{session('error_message')}}</p>
    </div>
@endif

@if(session('success_message'))
    <div>
        <p class="alert alert-success">{{session('success_message')}}</p>
    </div>
@endif
