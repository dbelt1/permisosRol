@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><small>Publicaciones realizadas</small></h3>
                    </div>

                    <div class="card-body">
                        @include('custom.message')
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">comentario</th>
                                    <th scope="col">nombre usuario</th>
                                    <th scope="col">Email Usuario</th>
                                    <th scope="col">Publicacion id</th>
                                    <th scope="col">Publicacion</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $item => $comment)
                                    <tr>
                                       
                                        <th>{{ $item + 1 }}</th>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->user->email }}</td>
                                        <td>{{ $comment->post->id }}</td>
                                        <td>{{ $comment->post->post }}</td>
                                        <td>

                                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @can('haveaccess', 'comment.show')
                                                    <a href="{{ route('comment.show', $comment->id) }}"
                                                        class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                                @endcan
                                                @can('haveaccess', 'comment.delete')
                                                    <button class="btn btn-danger btn-sm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                @endcan
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
