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

                        <form action="{{ route('timeline.update', $place->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <h3>Editar lugar linea de tiempo</h3>
                                <div class="form-group">
                                    <input type="file" name="images" class="form-control" value="{{old('image',$place->image)}}">
                                </div>
                                <div class="form-group">
                                   
                                    <select name="category_id" class="form-control">
                                        <option value="seleccionar">Seleccione una categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @isset($place->category->name)
                                                    @if ($category->name === $place->category->name)
                                                        selected
                                                    @endif
                                                @endisset>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name"
                                        value="{{ old('name', $place->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="description" placeholder="descripción"
                                        value="{{ old('email', $place->description) }}">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de linea de tiempo</label >
                                    <input type="date" class="form-control" name="createdDate" value="{{ old('email', $place->createdDate) }}">
                                </div>
                                <div class="form-group">
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input type="text" class="form-control" name="length" placeholder="Latitud" value="{{ old('length', $place->length) }}">
                                </div>
                                <div class="form-group">
                                    <label>Longitud</label >
                                    <input type="text" class="form-control" name="latitude"placeholder="Longitud" value="{{ old('latitude', $place->latitude) }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Editar Linea de tiempo">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
