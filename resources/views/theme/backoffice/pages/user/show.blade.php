@extends('theme.backoffice.layouts.admin')

@section('title', $user->name)

@section('head')

@endsection

@section('breadcrums')

    <li><a href="{{route('backoffice.user.index')}}"> Usuarios del sistema</a></li>
    <li>{{$user->name}}</li>
    
@endsection

@section('content')
<div class="section">
    <p class="caption"><strong>Usuario: </strong>{{$user->name}}</p>
    <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{$user->name}}</span>
                        </div>
                        <div class="card-action">
                            <a href="{{route('backoffice.user.edit', $user)}}">EDITAR</a>
                            <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    @include('theme.backoffice.pages.user.includes.user_nav')
                </div>
            </div>
        </div>
</div>
<form method="post" action="{{ route('backoffice.user.destroy', ['user'=>$user]) }}" name="delete_form">
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
        title: '¿Deseas eliminar este usuario?',
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
