@extends('plantilla.dashboard')
@section('titulo')
    Agregar Asesor
@endsection
@section('contenido')
    <div class="row" style="display: flex; align-items:center;">

        <div class="col-10">
            <h3>Registro de Asesor(es)</h3>
            <div class="row border-box" style="margin-bottom: 50px;">
                <div class="col-12">
                    <h4>Curso</h4>
                    <p><i><b>Tesis I 2022-1</b></i></p>
                    <h5>Importar un registro Excel</h5>
                </div>
                <form action="{{ route('director.importarAsesores') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-7">
                            <input class="form-control" type="file" name="importAsesor" id="importAsesor">
                        </div>
                        <div class="col-5">
                            <button class="btn btn-success" type="submit">Importar Registro</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row border-box">
                <h5>Registrar por asesor</h5>
                <form class="row g-3 needs-validation" action="{{ route('director.addAsesor') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-6">
                        <label for="cod_docente">Codigo Institucional</label>
                        <input class="form-control" minlength="4" maxlength="4" type="text" id="cod_docente"
                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" name="cod_docente"
                            placeholder="Ingrese su codigo de docente" autofocus required>
                    </div>
                    <div class="col-12">
                        <label for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" id="apellidos" name="apellidos"
                            placeholder="Ingrese sus apellidos" required>
                    </div>
                    <div class="col-12">
                        <label for="nombres">Nombres</label>
                        <input class="form-control" type="text" id="nombres" name="nombres"
                            placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="col-12">
                        <label for="gradoAcademico">Categoria</label>
                        <select class="form-control" name="gradAcademico" id="gradAcademico" required>
                            <option value="0">NOMBRADO</option>
                            <option value="1">CONTRATADO</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="carrera">Carrera</label>
                        <select class="form-control" name="carrera" id="carrera" required>
                            <option value="0">Contabilidad y Finanzas</option>
                            <option value="1">Administracion</option>
                            <option value="2">Economia</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="nombres">Direccion</label>
                        <input class="form-control" type="text" id="direccion" name="direccion"
                            placeholder="Ingrese su direccion" required>
                        <div class="invalid-feedback">
                            Debe contener menos de 45 caracteres.
                        </div>
                    </div>
                    <div class="col-12" style="margin-top: 10px;">
                        <button class="btn btn-success" type="button" onclick="verifyFields()">Registrar</button>
                        <a href="{{ route('user_information') }}" type="button" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('datos') == 'ok')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Asesor agregado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @elseif (session('datos') == 'oknot')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error al agregar el asesor',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
    <script type="text/javascript">
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);

        function verifyFields(){

        }
    </script>
@endsection
