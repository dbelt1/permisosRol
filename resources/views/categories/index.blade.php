@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Categorias</h2>
                </div>

                <div class="card-body">
                    @can('haveaccess','category.create')
                        <a href="{{route('category.create')}}"class='btn btn-primary float-right'>Crear</a>
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
                            @foreach ($categories as $item => $category)
                                <tr>
                                    <th>{{$item+1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('haveaccess','category.show')
                                                <a href="{{route('category.show',$category->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                            @endcan
                                            @can('haveaccess','category.edit')
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('haveaccess','category.delete')
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