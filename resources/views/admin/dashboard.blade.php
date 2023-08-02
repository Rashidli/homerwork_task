@include('admin.includes.header')

    <div class="container">

        @role('admin')
                <h1>Admin dashboard</h1>
        @endrole
        @role('user')
            <h1> User dashboard</h1>
        @endrole
        @role('manager')
            <h1> Manager dashboard</h1>
        @endrole

    </div>

@include('admin.includes.footer')
