@include('includes.header')

<div class="container">
    <div class="login_form" style="max-width: 450px; margin: 100px auto">

        <h3>Register</h3>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('register_submit')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('username')) <small class="form-text text-danger">{{$errors->first('username')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Submit</button>
            </div>
            <hr>
            <div class="mb-3">
                <a class="btn btn-primay" href="{{route('login')}}">Login</a>
            </div>
        </form>


    </div>
</div>

@include('includes.footer')
