@include('includes.header')

<div class="container">
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">({{$ticket->status}}){{$ticket->name}}</h5>
        <small class="text-body-secondary">{{$ticket->created_at}}</small>
    </div>
    <p class="mb-1">Vaciblik: {{$ticket->importance}}</p>
    <div id="messages">
        @foreach($ticket->messages as $message)
            <div class="card p-2 my-2">
                @if($message->admin)
                    <strong>Admin:{{$message->admin->name}}</strong>
                    @else
                    <strong>User:{{$ticket->user->username}}</strong>
                @endif
                <p>{{$message->message}}</p>
                <div>
                    @foreach($message->files as $file)
                        <div><a target="_blank" href="{{asset($file->file)}}">{{asset($file->file)}}</a></div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-2">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
    </div>
    <div>
        <form action="{{ route('ticket.new-message',$ticket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Yeni mesaj</label>
                <textarea class="form-control" name="message"></textarea>
                @error('message')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Fayllar</label>
                <input type="file" name="attachments[]" multiple>
                @error('attachments')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <button class="btn btn-primary btn-sm">Göndər</button>

        </form>
    </div>
</div>

@include('includes.footer')
