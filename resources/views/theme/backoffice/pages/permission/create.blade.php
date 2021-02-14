@extends('theme.backoffice.layouts.admin')

@section('title','Crear permiso')

@section('head')

@endsection

@section('breadcrums')
    <li>Crear permiso</li>
@endsection

@section('content')
<div class="section">
    <p class="caption">Introduce los datos para crear un nuevo permiso</p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                    <h4 class="header2">Crear permiso</h4>
                        <div class="row">
                        
                            <form class="col s12" method="post" action="{{ route('backoffice.permission.store') }}"  >

                                {{ csrf_field() }}

                                <div class="row">
                                    @error('name')
                                        <span style="color:red" class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name">
                                        <label for="name">Nombre del permiso</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ipunt-field col s12">
                                        <select name="role_id">
                                            <option value="" disabled="" selected="">Selecciona un rol</option>
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
                                        <textarea name="description" class="materialize-textarea" id="description" cols="30" rows="10"></textarea>
                                        <label for="email">Descripcion del permiso</label>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light right" type="submit" onclick="rolCreado()">Guardar
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
@endsection