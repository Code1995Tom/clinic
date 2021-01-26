@extends('theme.backoffice.layouts.admin')

@section('title','Roles del sistema')

@section('head')

@endsection

@section('content')
<div class="section">
    <p class="caption"><strong>Roles del sistema</strong></p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th data-field="id">Nombre</th>
                                        <th data-field="name">slug</th>
                                        <th data-field="price">Descripcion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $rol)
                                    <tr>
                                        <td><a href="{{route('backoffice.role.show', $rol)}}">{{$rol->name}}</a></td>
                                        <td>{{$rol->slug}}</td>
                                        <td>{{$rol->description}}</td>
                                        <td><a href="{{ route('backoffice.role.edit',$rol) }}">Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts-foot')

@endsection