@extends('theme.backoffice.layouts.admin')

@section('title','Usuarios del sistema')

@section('head')

@endsection

@section('breadcrums')
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
@endsection

@section('dropdown_settings')
    <li><a href="{{route('backoffice.user.create')}}" class="grey-text text-darken-2">Crear usuario</a></li>
@endsection

@section('content')
<div class="section">
    <p class="caption"><strong>Usuarios del sistema</strong></p>
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
                                        <th data-field="name">Edad</th>
                                        <th data-field="price">Email</th>
                                        <th colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{route('backoffice.user.show', $user)}}">{{$user->name}}</a></td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="{{ route('backoffice.role.edit',$user) }}">Editar</a></td>
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