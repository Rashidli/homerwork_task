@include('includes.header')

<div class="container">
    <div class="login_form" style="max-width: 450px; margin: 100px auto">
        <h3>Mailinizi yazın</h3>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('submit_forget_password')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <hr>

    </div>
</div>

@include('includes.footer')
