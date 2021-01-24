@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><small>Ver Publicación</small></h3>
                    </div>

                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="container">

                                <div class="form-group">
                                    <label>Comentario</label>
                                    <div>{{ $comment->comment }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Autor comentario:</label>
                                    <div>{{ $comment->user->name }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <div>{{ $comment->user->email }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Publicación Id:</label>
                                    <div>{{ $comment->post->id }}</div>
                                </div>
                                <div class="form-group">
                                    <label>Publicación:</label>
                                    <div>{{ $comment->post->post }}</div>
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('comment.index') }}" class="btn btn-danger">Volver</a>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
