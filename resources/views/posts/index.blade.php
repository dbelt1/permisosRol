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
                    @can('haveaccess','post.create')
                        <a href="{{route('post.create')}}"class='btn btn-primary float-right'>Crear</a>
                    @endcan
                    @include('custom.message')
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Escritor</th>
                            <th scope="col">Lugar</th>
                            <th scope="col">tags</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item => $post)
                                <tr>
                                    <th>{{$item+1}}</th>
                                    <td>{{$post->post}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->place->name}}</td>
                                    <td scope="col">@foreach($post->tags as $tags){{$tags->name}}<br>@endforeach</td>
                                    <td>
                                      
                                        <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('view',[$post,['post.show','postown.show']])
                                                <a href="{{route('post.show',$post->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                            @endcan
                                            @can('view',[$post,['post.edit','postown.edit']])
                                                <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('haveaccess','post.delete')
                                                <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
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