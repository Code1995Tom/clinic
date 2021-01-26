@extends('theme.backoffice.layouts.admin')

@section('title','Clinic')

@section('head')

@endsection

@section('content')
<div class="section">
    <p class="caption"><strong>Rol: </strong>{{$role->name}}</p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                    <h4 class="header2">Usuarios con el rol de {{$role->name}}</h4>
                        <div class="row">
                            <ul>
                                <p><strong>Slug: </strong>{{$role->name}}</p>
                                <p><strong>Descripcion: </strong>{{$role->description}}</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts-foot')

@endsection