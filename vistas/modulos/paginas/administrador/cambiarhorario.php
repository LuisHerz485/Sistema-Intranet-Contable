<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="menuAsistencia"><b class="text-red">Administración de Asistencia</b></a></li>
                        <li class="breadcrumb-item active h5">Cambio Horario</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div class="card-header">
                        <b class="h4">Cambiar Horario General</b>
                    </div>
                    <div class="card-body panel-body text-center" id="listadoregistrosD">
                        <h1><strong>HORARIO GENERAL</strong></h1>
                        <h4>Horario Actual:</h4>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <button type="button" id="btnCambiarHorario" class="btn btn-warning"> <i class="fas fa-edit"></i> Editar</button>
                                <button type="button" id="btnCancelar" class="btn btn-danger"><i class="fas fa-window-close"></i> Cancelar</button>
                            </div>
                        </div>
                        <form method="POST" id="formCambiarHorario">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label class="label-control">Hora de Inicio</label>
                                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                        <input type="text" id="horainicio" name="horainicio" class="form-control datetimepicker-input" data-target="#datetimepicker3" disabled />
                                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <label class="label-control">Hora de Salida</label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" id="horafin" name="horafin" class="form-control datetimepicker-input" data-target="#datetimepicker4" disabled />
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <button type="button" id="btnguardarHorario" class="btn btn-success"><i class="fas fa-stopwatch"> Guardar Nuevo Horario</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>