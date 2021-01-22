@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><small>Crear Publicación</small></h3>
                    </div>
                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label>Imagenes de Publicación</label>
                                    <input type="file" class="form-control" name="images[]" multiple accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Texto de la publicación</label>
                                    <textarea name="post" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="user_id" placeholder="email"
                                        value="{{ auth()->user()->id }}">
                                </div>
                                <div class="form-group">
                                    <label>Lugar</label>
                                    <select name="category_id" class="form-control">
                                        <option value="seleccionar">Seleccione un lugar</option>
                                        @foreach ($places as $place)
                                            <option value="{{ $place->id }}">{{ $place->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input type="number" name="latitude"class="form-control" placeholder="Latitud">
                                </div>
                                <div class="form-group">
                                    <label>Longitud</label >
                                    <input type="number" name="length"class="form-control" placeholder="Longitud">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Crear Publicación">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
