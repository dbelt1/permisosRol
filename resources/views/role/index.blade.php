@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Roles de la empresa</h2>
                </div>

                <div class="card-body">
                    @can('haveaccess','rol.create')
                        <a href="{{route('role.create')}}"class='btn btn-primary float-right'>Crear</a>
                    @endcan
                    @include('custom.message')
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Full Access</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $item => $rol)
                                <tr>
                                    <th>{{$item+1}}</th>
                                    <td>{{$rol->name}}</td>
                                    <td>{{$rol->description}}</td>
                                    <td>{{$rol->full_access}}</td>
                                    <td>
                                      
                                        <form action="{{route('role.destroy',$rol->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('haveaccess','rol.show')
                                                <a href="{{route('role.show',$rol->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                            @endcan
                                            @can('haveaccess','rol.edit')
                                                <a href="{{route('role.edit',$rol->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('haveaccess','rol.delete')
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
</div>
@endsection