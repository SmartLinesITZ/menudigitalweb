<?php
$iduser=$_REQUEST['iduser'];
$idrest=$_REQUEST['idrest'];
$destino=$_REQUEST['destino'];
$tiposervicio=$_REQUEST['tiposervicio'];
include "../conn/conexion.php";
$objConex = new Conexion();
$link=$objConex->conectarse();
saveReservacion($iduser,$idrest,$destino,$tiposervicio,$link);
function saveReservacion($iduser,$idrest,$destino,$tiposervicio,$link){
	$query = mysql_query("INSERT INTO pedido VALUES
		(null,$iduser,$idrest,'$tiposervicio',0,null,0,'$destino')", $link) or die(mysql_error());
		//##########################################################################
		$queryPedidos = mysql_query("SELECT * FROM pedido WHERE idrestaurante = $idrest
			AND idusuario=$iduser ORDER BY idpedido DESC LIMIT 1 ", $link) or die(mysql_error());
		//##########################################################################

		if (!$query&&!$queryPedidos){
			$row_array['mensaje']  = 'error';
		}else{
			$response = array();
			$rows = mysql_fetch_array($queryPedidos);
				$row_array['mensaje']  = 'success';
				$row_array['idpedido'] = $rows['idpedido'];
				$row_array['idusuario'] = $rows['idusuario'];
				$row_array['idrestaurante'] = $rows['idrestaurante'];
				$row_array['tiposervicio'] = $rows['tiposervicio'];
				$row_array['montototal'] = $rows['montototal'];
				$row_array['estado'] = $rows['estado'];
				$row_array['cantplatillos'] = $rows['noplatillos'];
				//DB
				$row_array['destino'] = $rows['destino'];
				array_push ($response, $row_array);

			echo $json_string = json_encode($response);
			mysql_close();
		}
	}
	?>
