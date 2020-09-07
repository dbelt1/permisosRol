@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create User</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.store')}}"  method="POST">
                        @csrf
                        <div class="container">

                            <h3>Crear Usuario</h3>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name',$user->name)}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email',$user->email)}}" readonly>
                            </div>

                           

                            <div class="form-group">
                                <label>Rol</label>              
                                <input type="text" class="form-control"
                                    @foreach ($roles as $role)
                                        @isset($user->roles[0]->name)
                                            @if($role->name === $user->roles[0]->name)
                                            value="{{$user->roles[0]->name}}"
                                            @endif
                                        @endisset readonly
                                    @endforeach> 
                            </div>

                            <div class="form-group">
                                <a href="{{route('user.index')}}" class="btn btn-danger">Volver</a>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Editar Usuario</a>
                            
                            </div>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
