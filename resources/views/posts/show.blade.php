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

                                <h3>Crear Usuario</h3>

                                <div class="form-group">
                                    <label>Texto de Post:</label>
                                    <div>{{ $post->post }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Categoría:</label>
                                    <div>{{ $post->place->name }}</div>
                                </div>

                                <div class="form-group">
                                    <label>Autor:</label>
                                    <div>{{ $post->user->name }}</div>
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('post.index') }}" class="btn btn-danger">Volver</a>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Editar
                                        Publicación</a>

                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
