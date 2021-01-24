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

                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" categoryholder="name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="description" categoryholder="descripción"
                                        value="{{ old('description') }}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Crear Categoria">
                                </div>
                                
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
