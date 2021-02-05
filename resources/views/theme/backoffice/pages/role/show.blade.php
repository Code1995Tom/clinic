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
                                <p><a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a></p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<form method="post" action="{{ route('backoffice.role.destroy', ['role'=>$role]) }}" name="delete_form">
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
        title: '¿Deseas eliminar este rol?',
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
                text:"El rol ha sido eliminado",
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
