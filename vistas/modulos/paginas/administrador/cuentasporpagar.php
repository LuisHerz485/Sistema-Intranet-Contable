<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">asdasd</b></a></li>
                        <li class="breadcrumb-item active h5">asdasdasd</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST["btnregistarcpp"])){
        if (controladorcuentasporpagar::ctrregistrarcuentasporpagar()){
            echo "<script>Swal.fire({
                    title: 'Registrado!',
                    text: '¡Se Registro correctamente!',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                })</script>";
        }else{
            echo "<script>Swal.fire({
                    title: 'Error!',
                    text: '¡No se pudo registrar!',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                })</script>";

        }

    }
    if(isset($_POST["btneliminarcuentapp"])){
        if (controladorcuentasporpagar::ctreliminarcuentaporpagar()){
            echo "<script>Swal.fire({
                title: 'ELIMINADO!',
                text: '¡se elimino el registro!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
        echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo eliminar!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";

        }
    }
    if(isset($_POST["btneditarcpp"])){
        if(controladorcuentasporpagar::ctreditarcuentaporpagar()){
            echo "<script>Swal.fire({
                title: 'MODIFICADO!',
                text: '¡se modifico el registro!',
                icon: 'success',
                confirmButtonText: 'Ok',
            })</script>";
        }else{
            echo "<script>Swal.fire({
                title: 'Error!',
                text: '¡No se pudo modificar!',
                icon: 'error',
                confirmButtonText: 'Ok',
            })</script>";
        }
    }

    ?>
    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header" style="background-color: rgb(204,0,0);">
                            <div class="row">
                                <b class="h4" style="color: white; font-size: 27px;">Cuentas por pagar</b>
                                <div class="col" align="right">
                                    <abbr title="Ayuda"><button class="btn btn-warning btn-circle" data-toggle="modal" data-target="#modalAyuda"><i class="fas fa-question-circle"></i></button></abbr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-body panel-body">
                            <div class="container-fluid">
                                
                                    <div class="row">


                                        <div class="col-12 col-xl-12">
                                            <div class="card card-primary">
                                                <div class="card-body panel-body">
                                                    <form id="cuentaporpagarform" method="POST" enctype="multipart/form-data">
                                                        <!-- Ingresar cuentas por pagar a proovedores  -->
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>RUC</th>
                                                                    <button class="btn btn-outline-success" id="btnBuscarRazon" type="button"><i class="fas fa-search"></i>Buscar Razon social</button>
                                                                    </div>
                                                                    <th>Proovedor</th>
                                                                    <th>tipo de documento</th>
                                                                    <th>Serie</th>
                                                                    <th>Numero de documento</th>
                                                                    <th>Fecha de emision</th>
                                                                    <th>Base</th>
                                                                    <th>IGV</th>
                                                                    <th>Total</th>
                                                                    <th>ESTATUS</th>
                                                                    <th>Vencimiento</th>
                                                                    <th>Fecha Pago</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input type="text" name="ruc" id="ruc" class="form-control"></td>
                                                                    <td><input type="text" name="razonsocial" id="razonsocial" class="form-control"></td>
                                                                    <td class="col-5 col-lg-1">
                                                                        <select name="tipodoc" id="tipodoc" class="form-control select2">
                                                                            <option>
                                                                                <?php
                                                                                $cuentasporpagar = modelocuentasporpagar::mdllistartipodoccuentaporpagar();
                                                                                if ($cuentasporpagar) {
                                                                                    foreach ($cuentasporpagar as $cuentasporpagar) {
                                                                                        echo '<option value="' . $cuentasporpagar["idtipodoccuentapp"] . '">' . $cuentasporpagar["tipodoc"] . '</option>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" name="serie" id="serie" class="form-control"></td>
                                                                    <td><input type="number" name="numerodoc" id="numerodoc" class="form-control"></td>
                                                                    <td><input type="date" name="fechaemision" id="fechaemision" class="form-control" onchange="sumardays();"></td>
                                                                    <td><input type="text" name="base" id="base" class="form-control" onchange="calcularigv(),sumartotaligv();"></td>
                                                                    <td><input type="text" name="igv" id="igv" class="form-control" readonly></td>
                                                                    <td><input type="text" name="total" id="total" class="form-control" onchange="basedetotal();"></td>
                                                                    <td><input type="text" name="estatus" id="estatus" class="form-control"></td>
                                                                    <td><input type="text" name="vencimiento" id="vencimiento" class="form-control" placeholder="dias" value="0" onchange="sumardays();"></td>
                                                                    <td><input type="date" name="fechapago" id="fechapago" class="form-control"></td>
                                                                    <input type="hidden" name="idcuentaporpagar" id="idcuentaporpagar" class="form-control">
                                                                </tr> 
                                                            </tbody>
                                                        </table>



                                                        <table id="opcionesregistrarcuentapp">
                                                            <tbody>
                                                                <td><button id="btnregistrarcpp" class="btn btn-primary btn-lg btn-block pull-right" name="btnregistarcpp" value="btnregistarcpp" type="submit"><span>AÑADIR REGISTRO</span></button></td>
                                                                <td><button id="btnlimpiarformcuentapp" name="btnlimpiarformcuentapp" class="btn btn-lg.btn-block pull-right" type="button"></button></td>
                                                            </tbody>
                                                        </table>
                                                        <table class="d-none" id="opcioneseditarcuentapp">
                                                            <tbody>
                                                                <td><button id="btneditarcpp" class="btn btn-warning btn-lg btn-block pull-right" name="btneditarcpp" value="btneditarcpp" type="submit"><span>EDITAR REGISTRO</span></button></td>
                                                                <td><button id="btnregresarcpp" class="btn btn-info btn-lg btn-block pull-right" name="btnregresarcpp" value="btnregresarcpp" type="button"><span>back</span></button></td>
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <div class="container-fluid" id="opcionesfiltrar">
                                                            <div class="col-12 col-lg-3">
                                                                <label>Seleccione tipo de documento:</label>
                                                                <select name="idtipodoccuentaporpagar" id="idtipodoccuentaporpagar" class="form-control select2" required>
                                                                    <option value="1">
                                                                        <?php
                                                                        $cuentasporpagar = modelocuentasporpagar::mdllistartipodoccuentaporpagar();
                                                                        if ($cuentasporpagar) {
                                                                            foreach ($cuentasporpagar as $cuentasporpagar) {
                                                                                echo '<option value="' . $cuentasporpagar["idtipodoccuentapp"] . '">' . $cuentasporpagar["tipodoc"] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                                
                                                            </div>
                                                            <div class="col-12 col-lg-3">
                                                                    <label>Opcion:</label>
                                                                    <button type="button" class="btn btn-outline-danger  btn-block" id="btnfiltrarcuentas" name="btnfiltrarcuentas"><i class="fas fa-search"></i> Filtrar</button>
                                                            </div>
                                                        </div>
                                                        <!-- Mostrar cuentas por pagar a proovedores  -->
                                                    
                                                        <div class="card-body panel-body">
                                                        
                                                            <table id="tablacuentas" class="table table-bordered table-striped">
                                                                <thead style="background-color: OrangeRed; color:white;">
                                                                    <tr>
                                                                    <th>RUC</th>
                                                                    <th>Proovedor</th>
                                                                    <th>tipo de documento</th>
                                                                    <th>Serie</th>
                                                                    <th>Numero de documento</th>
                                                                    <th>Fecha de emision</th>
                                                                    <th>Base</th>
                                                                    <th>IGV</th>
                                                                    <th>Total</th>
                                                                    <th>ESTATUS</th>
                                                                    <th>Vencimiento</th>
                                                                    <th>Fecha Pago</th>
                                                                    <th class= "no-exportar">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $cuentasporpagar = controladorcuentasporpagar::ctrlistarcuentasporpagar();
                                                                    if($cuentasporpagar){
                                                                        $monto=0;
                                                                        foreach($cuentasporpagar as $cuentasporpagar){
                                                                            echo '<tr>';
                                                                            echo '<td>'.$cuentasporpagar["ruc"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["proovedor"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["tipodoc"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["serie"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["numdoc"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["fechaemision"].'</td>';
                                                                            echo '<td>S/.'.$cuentasporpagar["base"].'</td>';
                                                                            echo '<td>S/.'.$cuentasporpagar["igv"].'</td>';
                                                                            echo '<td>S/.'.$cuentasporpagar["total"].'</td>';
                                                                            //suma para calcular el total
                                                                            $monto+= $cuentasporpagar["total"];

                                                                            echo '<td>'.$cuentasporpagar["estatus"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["vencimiento"].'</td>';
                                                                            echo '<td>'.$cuentasporpagar["fechapago"].'</td>';
                                                                            echo '<td>
                                                                                <div class="btn-group">'.
                                                                                    "<button id='btneliminarcuentapp' name='btneliminarcuentapp' type='submit' class='btn btn-danger btn-sm btn-eliminar-cuentapp' datacuentapp='" . json_encode($cuentasporpagar) . "'><i class='fa fa-times'></i></button>
                                                                                    <button id='btnmodificarcuentapp' name='btnmodificarcuentapp' type='button' class='btn btn-warning btn-sm btn-modificar-cuentapp' datacuentapp='" . json_encode($cuentasporpagar) . "'><i class='fa fa-pencil'></i></button>
                                                                                    
                                                                                </div>"
                                                                            .'</td>';
                                                                            echo '</tr>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr style="background-color: OrangeRed; color:white;">
                                                                    <th>RUC</th>
                                                                    <th>Proovedor</th>
                                                                    <th>tipo de doc</th>
                                                                    <th>Serie</th>
                                                                    <th>Numero de documento</th>
                                                                    <th>Fecha de emision</th>
                                                                    <th>Base</th>
                                                                    <th>IGV</th>
                                                                    <th>TOTAL</th>
                                                                    <th>STATUS</th>
                                                                    <th>Vencimiento</th>
                                                                    <th>Fecha Pago</th>
                                                                    <th class= "no-exportar">Opciones</th>
                                                                    </tr>

                                                                    <tr>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>TOTAL</th>
                                                                    <th>Base</th>
                                                                    <th>IGV</th>
                                                                    <th><?php if ($monto == 0){
                                                                            echo '0.00';
                                                                        }else{
                                                                            echo 'S/.', $monto;
                                                                        } ?></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    </tr>
                                                                </tfoot>

                                                            </table>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>