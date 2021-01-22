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
                                <div>{{$place->name}}</div>
                            </div>

                            <div class="form-group">
                                <label>Descripción</label>
                                <div>{{$place->description}}</div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('place.index')}}" class="btn btn-danger">Volver</a>
                                <a href="{{route('place.edit',$place->id)}}" class="btn btn-primary">Editar Lugar</a>
                            
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
