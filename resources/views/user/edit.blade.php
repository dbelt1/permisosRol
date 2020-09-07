@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit User</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('user.update',$user->id)}}"  method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">

                            <h3>Crear Usuario</h3>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name',$user->name)}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email',$user->email)}}">
                            </div>
                            <div class="form-group">
                                <select name="roles" id="roles" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}"
                                            @isset($user->roles[0]->name)
                                                @if($role->name === $user->roles[0]->name)
                                                    selected
                                                @endif
                                            @endisset>    
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" type="password" name="password" placeholder="password" value="{{ old('password',$user->password)}}">      
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Editar Usuario">
                            </div>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
