@include('admin.includes.header')

<div class="container">

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
        <br>
        <br>
    <h3>Permission elave et</h3>
        <form action="{{route('create_permission')}}" method="post">
            @csrf
            <input type="text" placeholder="name" name="name">
            <br>
            <br>
            <input type="text" placeholder="slug" name="slug">
            <br><br>
            <button>Submit</button>
            <br>
            <br>
        </form>
    <ul>
        @foreach($permissions as $permission)
            <li>name: {{$permission->name}} <br> slug: {{$permission->slug}} </li>
        @endforeach
    </ul>

</div>

@include('admin.includes.footer')
