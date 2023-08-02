@include('admin.includes.header')

<div class="container">
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <br>
    <br>
    <div class="list-group" style="max-width: 450px">
        @foreach($users as $user)

            <div  title="Edit" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Username: {{$user->username}}</h5>
                    <div>
                        <a href="{{route('edit_user', $user->id)}}" class="btn btn-primary">Editlə</a>
                        <a href="{{route('delete_user', $user->id)}}" class="btn btn-danger">Sil</a>
                    </div>
                </div>
                <small class="text-body-secondary">Email: {{$user->email}}</small>
                @if($user->is_active == true)
                    <p class="mb-1">Active</p>
                @elseif($user->is_active == false)
                    <p class="mb-1">Deactive</p>
                @endif
            </div>

        @endforeach
    </div>
</div>

@include('admin.includes.footer')
