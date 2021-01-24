@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('custom.message')
                        <div class="container">

                            <h3>Ver Lugar</h3>
                            <img src=" {{ $place->url_path }}" alt="" width="200px" height="200px">
                            <div class="form-group">
                                <label>Name</label>
                                <div>{{$place->name}}</div>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <div>{{$place->description}}</div>
                            </div>
                            <div class="form-group">
                                <label>fecha historica</label>
                                <div>{{$place->createdDate}}</div>
                            </div>
                            <div class="form-group">
                                <a href="{{route('timeline.index')}}" class="btn btn-danger">Volver</a>
                                <a href="{{route('timeline.edit',$place->id)}}" class="btn btn-primary">Editar Linea de tiempo</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
