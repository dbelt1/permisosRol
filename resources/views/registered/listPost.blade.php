@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($posts as $post)
            <div class="content-post">
                <div class="autor-post">
                    <p class="name">{{ $post->user->name }}</p>
                </div>
                <div class="date-post">
                    <p class="date">{{ \Carbon\Carbon::parse( $post->created_at )->toDayDateTimeString() }}</p>
                </div>
                <div class="text-post">
                    <p class="post">
                        {{ $post->post }}
                    </p>
                </div>
                @foreach ($post->photos as $photo)
                    <img src=" {{ $photo->url_path }}" alt="" width="200px" height="200px">
                @endforeach
                @foreach ($post->comments as $comment)
                    <div class="comments">
                        <b>{{$comment->user->name}}</b><br>
                        @if(auth()->user()->roles[0]->id ===1)
                        <b>{{$comment->user->email}}</b>
                        @endif
                        <div>{{ $comment->comment }}</div>
                    </div>
                    <hr>
                @endforeach
                <form action="{{ route('userRegistered.comment') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="form-control" placeholder="Escribe tu comentario ... ">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                    </div>
                    <button class="btn btn-primary" type="submit">Comentar</button>

                </form>
            </div>
            <br>
        @endforeach
    </div>
@endsection
