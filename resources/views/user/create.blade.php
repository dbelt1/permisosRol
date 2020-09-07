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
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email')}}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" type="password" name="password" placeholder="password" value="{{ old('password')}}">      
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear Usuario">
                            </div>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
