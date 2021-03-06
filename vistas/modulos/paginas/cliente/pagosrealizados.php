<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Seguimiento de Pagos</b></a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger">
          <div class="card-header" style="background-color: rgb(204,0,0);">
            <b class="h4" style="color: white; font-size: 27px;">Pagos Realizados</b>
          </div>
          <div class="card-body">
            <div id="tbllistado">
              <table id="mostrarArchivo" class="table table-striped tablaDataClientesPagos dt-responsive text-center">
                <thead style="background-color:lightgray; font-size: 20px;">
                  <th>Fecha de Emisión</th>
                  <th>Local</th>
                  <th>Servicio</th>
                  <th>Monto</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Estado</th>
                  <th class="no-exportar">Constancia</th>
                </thead>
                <tbody>
                  <?php
                  $valor = $_SESSION['idcliente'];
                  $cobranza = ModeloCobranza::mdlMostrarCobranza($valor);
                  foreach ($cobranza as $key => $value) {
                    $detCob = ModeloDetalleCobranza::mdlMostrarDetalleCobranza($value['idcobranza']);
                    if ($value['estado'] == "1") {
                      echo '<tr>';
                      echo '<td>' . $value['fechaemision'] . '</td>
                            <td>' . $value['direccion'] . '</td>
                            <td>' . $detCob[0]['plan'] . '</td>
                            <td>' . $detCob[0]['monto'] . '</td>
                            <td>' . $value['fechavencimiento'] . '</td>
                            <td><button class="btn btn-success btn-sm">Pagado</button</td>
                            <td><abbr title="Constancia"><form action="ajax/generarPDF.php" method="POST" target="_blank"> <input type="hidden" name="idcobranza"  value="' . $value['idcobranza'] . '" /><button type="submit" class="btn btn-success btn-circle btn-xl"><i class="fas fa-paste"></i></button></form></abbr></td>';
                      echo '</tr>';
                    }
                  }
                  ?>
                </tbody>
                <tfoot style="background-color:lightgray; font-size: 20px;">
                  <th>Fecha de Emisión</th>
                  <th>Fecha de Vencimiento</th>
                  <th>Servicio</th>
                  <th>Monto Actual</th>
                  <th>Local</th>
                  <th>Estado</th>
                  <th class="no-exportar">Constancia</th>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>