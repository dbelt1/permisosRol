@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('timeline.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <input type="file" name="images" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="category_id" class="form-control" >
                                        <option value="seleccionar">Seleccione una cateogoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="description" placeholder="descripción"
                                        value="{{ old('description') }}">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de linea de tiempo</label >
                                    <input type="date" class="form-control" name="createdDate">
                                </div>
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input type="text" class="form-control" name="length" placeholder="Latitud">
                                </div>
                                <div class="form-group">
                                    <label>Longitud</label >
                                    <input type="text" class="form-control" name="latitude"placeholder="Longitud">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Crear Linea de tiempo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
