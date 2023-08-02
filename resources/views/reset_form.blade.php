@include('includes.header')

<div class="container">
    <div class="login_form" style="max-width: 450px; margin: 100px auto">
        <h3>Reset form</h3>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('submit_reset_form')}}" method="post">
            @csrf
            <input name="token" type="hidden" value="{{$token}}">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" value="{{$email}}" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('password_confirmation')) <small class="form-text text-danger">{{$errors->first('password_confirmation')}}</small> @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <hr>


    </div>
</div>

@include('includes.footer')
