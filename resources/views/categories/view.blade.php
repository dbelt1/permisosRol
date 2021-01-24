@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('custom.message')
                        <div class="container">

                            <h3>Crear Usuario</h3>

                            <div class="form-group">
                                <label>Name</label>
                                <div>{{$category->name}}</div>
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <div>{{$category->description}}</div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('category.index')}}" class="btn btn-danger">Volver</a>
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Editar Categoria</a>
                            
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
