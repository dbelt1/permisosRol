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

                        <form action="{{ route('category.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <h3>Editar Categoria</h3>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" categoryholder="name"
                                        value="{{ old('name', $category->name) }}">
                                </div>

                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="description" categoryholder="descripción"
                                        value="{{ old('email', $category->description) }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Editar Categoria">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
