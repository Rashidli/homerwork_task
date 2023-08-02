@include('admin.includes.header')

<div class="container">

    <div class="login_form" style="max-width: 450px; margin: 100px auto">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <h3>Edit user</h3>
        <form action="{{route('update_user',$user->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">username</label>
                <input type="text" name="username" value="{{$user->username}}" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('username')) <small class="form-text text-danger">{{$errors->first('username')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Parol</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <select class="form-control" name="is_active" id="">

                    <option value="1" {{ $user->is_active == true ? 'selected' : ''}}>Active</option>
                    <option value="0" {{ $user->is_active == false ? 'selected' : ''}}>Deactive</option>

                </select>
                @if($errors->first('is_active')) <small class="form-text text-danger">{{$errors->first('is_active')}}</small> @endif
            </div>

            <div class="mb-3">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>


    </div>

</div>

@include('admin.includes.footer')
