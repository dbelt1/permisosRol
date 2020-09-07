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
                    @can('haveaccess','user.create')
                        <a href="{{route('user.create')}}"class='btn btn-primary float-right'>Crear</a>
                    @endcan
                    @include('custom.message')
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Name</th>
                            <th scope="col">email</th>
                            <th scope="col">roles</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item => $user)
                                <tr>
                                    <th>{{$item+1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @isset($user->roles[0]->name)
                                        {{$user->roles[0]->name}}
                                        @endisset
                                    </td>
                                    <td>
                                      
                                        <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @can('view',[$user,['user.show','userown.show']])
                                                <a href="{{route('user.show',$user->id)}}" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                            @endcan
                                            @can('view',[$user,['user.edit','userown.edit']])
                                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('haveaccess','user.delete')
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