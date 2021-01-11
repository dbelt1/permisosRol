@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><small>Editar Publicación</small></h3>
                    </div>

                    <div class="card-body">
                        @include('custom.message')

                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="container">

                                <h3>Crear Usuario</h3>
                                <div class="form-group">
                                    <label>Texto de la publicación</label>
                                    <textarea name="post" class="form-control">{{ old('post', $post->post) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <select name="category_id" id="categories" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @isset($post->category->name)
                                                    @if ($category->name === $post->category->name)
                                                        selected
                                                    @endif
                                                @endisset>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Editar Publicación">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
