@extends('theme.backoffice.layouts.admin')

@section('title','Editar permiso ' . $permission->name)

@section('head')

@endsection

@section('breadcrums')
    <li>Editar permiso {{$permission->name}}</li>
@endsection

@section('content')
<div class="section">
    <p class="caption">Introduce los datos para editar el permiso </p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                    <h4 class="header2">Editar permiso</h4>
                        <div class="row">
                        
                            <form class="col s12" method="post" action="{{ route('backoffice.permission.update', $permission) }}"  >

                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row">
                                    @error('name')
                                        <span style="color:red" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" value="{{$permission->name}}">
                                        <label for="name">Nombre del permiso</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ipunt-field col s12">
                                        <select name="role_id">
                                            <option value="{{$permission->role_id}}" selected="">{{$permission->role->name}}</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span style="color:red" class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    @error('description')
                                        <span style="color:red" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-field col s12">
                                        <textarea name="description" class="materialize-textarea" id="description" cols="30" rows="10">{{$permission->description}}</textarea>
                                        <label for="email">Descripcion del permiso</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light right" type="submit" onclick="roleUpdate()">Actualizar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection

@section('scripts-foot')
<script>
    function roleUpdate(){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se ha actualizado el permiso exitosamente',
        })
    }
</script>
@endsection