@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Role</h2>
                </div>

                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.store')}}"  method="POST">
                        @csrf
                        <div class="container">

                            <h3>all data</h3>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="slug" value="{{ old('slug')}}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea cols="30" rows="10"class="form-control" name="description" placeholder="description" value="{{ old('description')}}"> </textarea>
                                
                            </div>

                            <div class="form-group">
                                <label>Full access</label>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" type="radio" 
                                    name="full_access" id="full_accessyes" value="yes"
                                    @if (old('full_access')=="yes") 
                                        checked 
                                    @endif
                                    >
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class=" form-check form-check-inline">
                                    <input class="form-check-input" type="radio" 
                                        name="full_access" id="full_accessno" value="no"
                                        @if (old('full_access')=="no") 
                                            checked 
                                        @endif
                                        @if (old('full_access')===null) 
                                            checked 
                                        @endif
                                    >
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <h3><small>Permission list</small></h3>

                            @foreach ($permissions as $permission)

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" 
                                    name="permission[]" id="permission_{{$permission->id}}"
                                    value="{{$permission->id}}"
                                    @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                                        checked
                                    @endif
                                     >
                                 <label class="custom-control-label" for="permission_{{$permission->id}}">
                                        {{$permission->id}}
                                        -
                                        {{$permission->name}}
                                        -
                                        <em>({{$permission->description}})</em>
                                    
                                    </label>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Crear">
                            </div>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
