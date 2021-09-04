<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Administración</a></li>
            <li class="breadcrumb-item active">Check List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Check List - Personal</h3>
          </div>
          <div class="card-body panel-body" id="listadoUserCL">
            <table class="table table-striped tablaDataTableC dt-responsive text-center">
              <thead>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Área</th>
                <th>Opción</th>
              </thead>
              <tbody>
                <?php
                $item = null;
                $valor = null;
                $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
                foreach ($usuarios as $key => $value) {
                  if ($value['estado'] == 1) {
                    echo '<tr> 
                    <td>' . $value['nombre'] . ' ' . $value['apellidos'] . '</td>
                    <td>' . $value['email'] . '</td>
                    <td>' . $value['departamento'] . '</td>
                    <td><button class="btn btn-s btn-warning btnListarCheckList" idusuario="' . $value["idusuario"] . '" onclick="mostrarformCL(true)"><i class="far fa-list-alt"></i></button></td>
                    </tr>';
                  }
                }
                ?>
              </tbody>
              <tfoot>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Área</th>
                <th>Opción</th>
              </tfoot>
            </table>
          </div>

          <div class="card-body panel-body" id="formularioCheckList">
            <table id="mostrarCheckList" class="table table-striped tablaDataCheckList dt-responsive">
              <thead>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Tiempo</th>
                <th>Estado</th>
              </thead>
              <tbody>
              </tbody>
            </table>
            <div>
              <button class="btn btn-danger" onclick="cancelarCL()" type="button"><i class="fa fa-arrow-circle-left"></i> Volver</button>
              <button class="btn btn-success btnAgregarCL float-sm-right mr-3 mt-2" data-toggle="modal" data-target="#modalCheckList"><i class="far fa-plus-square"></i> Añadir</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- /.content-wrapper -->

<!-- MODAL DE AGREGAR ACTIVIDAD AL CHECKLIST -->
<div class="modal fade" id="modalCheckList" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <form role="form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Check List</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Actividades del día: </label>
                  <input type="date" name="modalFecha" class="form-control-fc" id="modalFecha">
                  <button class="btn btn-warning float-sm-right btnAgregarActividad"><i class="fas fa-plus"></i> Agregar</button>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label>Actividad</label>
                  <textarea name="modalActividad" id="modalActividad" class="form-control"></textarea> 
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Estado</label>
                  <select></select>
                  <input name="modalEstado" id="modalEstado" class="form-control">
                </div>  
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Hora Inicio</label>
                  <input type="time" name="modalHoraInicio" id="modalHoraInicio" class="form-control" min="8:00" >
                </div>
                  <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Hora Fin</label>
                  <input type="time" name="modalHoraFin" id="modalHoraFin" class="form-control" >
                </div>           
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        </div>
      </div>
    </form>
  </div>
</div>
