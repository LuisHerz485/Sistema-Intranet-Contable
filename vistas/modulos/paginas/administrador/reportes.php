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
          <li class="breadcrumb-item active h5">Reportes</li></b>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card">
          <div class="card-header" style="background-color: rgb(204,0,0);">
          <b style="color: white; font-size: 27px;">Consulta de Asistencia por Fecha</b>
          </div>
          <div class="card-body panel-body" id="listadoregistrosR">
            <div class="row">
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
              </div>
              <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <label>Fecha Fin</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
              </div>
              <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <label for="">Empleado</label>
                <select name="idusuario" id="idusuario" class="form-control select2" data-live-search="true" required>
                  <option value="0">Seleccione ...</option>
                  <?php
                  if ($usuarios = ModeloUsuarios::mdlMostrarUsuariosNombre()) {
                    foreach ($usuarios as $usuario) {
                      echo '<option value="' . $usuario['idusuario'] . '">' . $usuario['nombre'] . ' ' . $usuario['apellidos'] . '</option>';
                    }
                  }
                  ?>
                </select>
              </div>
              <button class="btn btn-outline-danger btn-s btnMostrar" style="width:10%; height:40%; margin-top:2.7%; margin-left:4%;"><strong><i class="far fa-eye"></i> Mostrar</strong></button>
            </div>
            <br />
            <div id="tbllistado">
              <table id="mostrarReporte" class="table table-striped tablaDataAsistencia dt-responsive">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th class="no-exportar">Código</th>
                  <th>Área</th>
                  <th>Nombre Completo</th>
                  <th>Asistencia</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th class="no-exportar">Detalle</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot style="background-color:lightgray; font-size: 20px;">
                  <th>Código</th>
                  <th>Área</th>
                  <th>Nombre Completo</th>
                  <th>Asistencia</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Detalle</th>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>