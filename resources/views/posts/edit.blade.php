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

                        <form action="{{ route('post.update', $post->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="form-group">
                                    <label>Imagenes de Publicación</label>
                                    <input type="file" class="form-control" name="images[]" multiple accept="image/*">
                                <div class="form-group">
                                    <label>Texto de la publicación</label>
                                    <textarea name="post" class="form-control">{{ old('post', $post->post) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <select name="place_id" id="places" class="form-control">
                                        @foreach ($places as $place)
                                            <option value="{{ $place->id }}" @isset($post->place->name)
                                                    @if ($place->name === $post->place->name)
                                                        selected
                                                    @endif
                                                @endisset>
                                                {{ $place->name }}
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
