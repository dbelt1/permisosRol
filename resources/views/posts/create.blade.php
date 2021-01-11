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

                        <form action="{{ route('post.store') }}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <label>Texto de la publicación</label>
                                    <textarea name="post" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="user_id" placeholder="email"
                                        value="{{ auth()->user()->id }}">
                                </div>

                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="seleccionar">Seleccione una Categoria</option>
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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
