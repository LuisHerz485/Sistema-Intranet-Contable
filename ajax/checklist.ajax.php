<?php

require_once "../controladores/checklist.controlador.php";
require_once "../modelos/checklist.modelo.php";


if (isset($_POST["opcion"])) {
    switch ($_POST["opcion"]) {
        case "registrar": {
                $respuesta = ["registrado" => ControladorChecklist::registrarChecklist()];
                echo json_encode($respuesta);
                break;
            }
        default: {
                break;
            }
    }
}
