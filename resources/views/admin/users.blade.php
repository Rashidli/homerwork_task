@include('admin.includes.header')

<div class="container">
    @foreach($users as $user)
        <div><a href="{{ route('user.tickets',$user->id) }}">{{$user->username}}</a></div>
    @endforeach
</div>

@include('admin.includes.footer')
