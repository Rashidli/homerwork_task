<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Homework</title>
</head>
<body>
@if(Auth::guard('admin')->user())
    <header>
        <div class="container">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand">{{Auth::guard('admin')->user()->name}}</a>
                    <a href="{{route('permission_list')}}">Permission list</a>
                    <a href="{{route('role_list')}}">Role list</a>
                    <a href="{{route('admin_list')}}">Admin list</a>
                    <a href="{{route('users_list')}}">Users</a>
                    <a href="{{route('users.list')}}">Tickets</a>
                    <a href="{{route('admin_logout')}}">Çıxış edin</a>
                </div>
            </nav>
        </div>
    </header>
@endif
