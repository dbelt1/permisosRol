@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Role</h2>
                </div>
            
                <div class="card-body">
                    @include('custom.message')

                    <form action="{{route('role.update',$role->id)}}"  method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container">

                            <h3>all data</h3>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name',$role->name)}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="slug" value="{{ old('slug',$role->slug)}}" readonly>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                        
                                <textarea cols="30" rows="10" class="form-control" id="description" name="description" readonly>{{ old('description',$role->description)}} </textarea>
                            </div>

                            <div class="form-group">
                                <label>Full access</label>
                                <div  class=" form-check form-check-inline">
                                    <input disabled class="form-check-input" type="radio" 
                                    name="full_access" id="full_accessyes" value="yes"
                                    @if ($role['full_access']=="yes") 
                                        checked                        
                                    @elseif (old('full_access')=="yes") 
                                        checked 
                                    @endif
                                    >
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class=" form-check form-check-inline">

                                <div class=" form-check form-check-inline">
                                    <input disabled class="form-check-input" type="radio" 
                                    name="full_access" id="full_accessno" value="no"
                                    @if ($role['full_access']=="no") 
                                        checked                        
                                    @elseif (old('full_access')=="no") 
                                        checked 
                                    @endif
                                    >
                                    <label class="form-check-label">No</label>
                                </div>


                            </div>

                            <h3><small>Permission list</small></h3>

                            @foreach ($permissions as $permission)

                                <div class="custom-control custom-checkbox">
                                    <input disabled type="checkbox" class="custom-control-input" 
                                    name="permission[]" id="permission_{{$permission->id}}"
                                    value="{{$permission->id}}"
                                    @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                                        checked
                                    @endif

                                    @if( is_array($permission_role) && in_array("$permission->id", $permission_role)    )
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
                                <a href="{{route('role.index')}}" class="btn btn-danger">Volver</a>    
                            <a href="{{route('role.edit',$role->id)}}" class="btn btn-primary">Editar</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
