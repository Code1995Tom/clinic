@extends('theme.backoffice.layouts.admin')

@section('title', $permission->name)

@section('head')

@endsection

@section('breadcrums')

    <li><a href="{{route('backoffice.role.index')}}">Roles del sistema</a></li>
    <li><a href="{{route('backoffice.role.show', $permission->role)}}"><strong>Rol:</strong> {{$permission->role->name}}</a></li>
    <li>{{$permission->name}}</li>
    
@endsection

@section('content')
<div class="section">
    <p class="caption"><strong>Permiso: </strong>{{$permission->name}}</p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <span class="car-title">{{$permission->name}}</span>
                            <p><strong>Slug: </strong>{{$permission->slug}}</p>
                            <p><strong>Descripcion: </strong>{{$permission->description}}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{route('backoffice.permission.edit', $permission)}}">EDITAR</a>
                            <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<form method="post" action="{{ route('backoffice.permission.destroy', ['permission'=>$permission]) }}" name="delete_form">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endsection

@section('scripts-foot')
<script>

    function enviar_formulario()
    {
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: '¿Deseas eliminar este permiso?',
        text: "Esta accion no se puede deshacer!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si continuar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: false
        }).then((result) => {
        if (result.isConfirmed) {
            document.delete_form.submit();
            swal.fire({
                title: "Exito",
                text:"El permiso ha sido eliminado",
                icon:"success",
                showConfirmButton:true,
                closeOnConfirm: true
            });
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Operacion cancelada',
            'Registro no eliminado',
            'error'
            )
        }
        })
    }

</script>
@endsection
