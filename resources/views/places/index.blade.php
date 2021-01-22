@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Usuarios de la empresa</h2>
                </div>

                <div class="card-body">
                    @can('haveaccess','place.create')
                        <a href="{{route('place.create')}}"class='btn btn-primary float-right'>Crear</a>
                    @endcan
                    @include('custom.message')
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($places as $item => $place)
                                <tr>
                                    <th>{{$item+1}}</th>
                                    <td>{{$place->name}}</td>
                                    <td>{{$place->description}}</td>
                                    <td>
                                        <form action="{{route('place.destroy',$place->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('haveaccess','place.show')
                                                <a href="{{route('place.show',$place->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                            @endcan
                                            @can('haveaccess','place.edit')
                                                <a href="{{route('place.edit',$place->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('haveaccess','place.delete')
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