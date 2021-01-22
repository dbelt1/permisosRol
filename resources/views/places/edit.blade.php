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

                        <form action="{{ route('place.update', $place->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <h3>Editar lugar</h3>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="name"
                                        value="{{ old('name', $place->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>Lugar</label>
                                    <input type="text" class="form-control" name="description" placeholder="descripción"
                                        value="{{ old('email', $place->description) }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Editar Lugar">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
