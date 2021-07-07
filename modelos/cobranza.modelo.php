<?php 
	require_once "conexion.php";
	class ModeloCobranza{
        
		static public function mdlMostrarCobranza($valor){
            $stmt = Conexion::conectar()->prepare("SELECT DISTINCT C.idcobranza as idcobranza, C.idlocalcliente as idlocalcliente, C.idcliente as idcliente, C.idubicacion as idubicacion, C.fechaemision as fechaemision, C.fechavencimiento as fechavencimiento, C.estado as estado, C.descripcion as descripcion, U.distrito as distrito, U.departamento as departamento, LC.direccion as direccion
            FROM cobranza C 
            JOIN localcliente LC ON LC.idlocalcliente = C.idlocalcliente 
            JOIN localcliente LCC ON LCC.idcliente = C.idcliente 
            JOIN localcliente LCU ON LCU.idubicacion = C.idubicacion 
            JOIN ubicacion U ON U.idubicacion = LCU.idubicacion WHERE C.idcliente = $valor");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
		}
        
        static public function mdlAgregarCobranza($valor1,$valor2,$valor3,$valor4,$valor5){
            $estado = "0";
            $stmt = Conexion::conectar()->prepare("INSERT INTO cobranza(idlocalcliente, idcliente, idubicacion, fechavencimiento, estado, descripcion) VALUES (:idlocalcliente, :idcliente, :idubicacion, :fechavencimiento, :estado, :descripcion)");
            $stmt -> bindParam(":idlocalcliente", $valor1,PDO::PARAM_STR);
            $stmt -> bindParam(":idcliente", $valor2,PDO::PARAM_STR);
            $stmt -> bindParam(":idubicacion", $valor3,PDO::PARAM_STR);
            $stmt -> bindParam(":fechavencimiento", $valor4,PDO::PARAM_STR);
            $stmt -> bindParam(":estado",$estado,PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion",$valor5,PDO::PARAM_STR);
            if($stmt -> execute()){
                return "ok";
            }else{
                return "error";
            }
    
            $stmt -> close();
            $stmt = null;
        } 

        static public function mdlActualizarCobranza($tabla,$item1,$valor1,$item2,$valor2){
			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
			$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
			$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt ->close();
			$stmt = null;
		}

		static public function mdlConsultarCobranza($idcobranza){ 
            $stmt = Conexion::conectar()->prepare("SELECT * FROM cobranza WHERE idcobranza = \"$idcobranza\"");
            $stmt -> execute();
            return $stmt -> fetch();
            
            $stmt -> close();
            $stmt = null;
        }
	}