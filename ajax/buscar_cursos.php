<?php
if (isset($_GET['term'])){
	# conectare la base de datos
require_once '../conf/confconexion.php';
function runQuery($query) {
		$result = mysqli_query($objConexion,$query);
		while($row=mysqli_fetch_array($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
}

$return_arr = array();

$sqlc = "SELECT  * FROM tb_cursos WHERE  descripcion like '%".$_GET['term']."%' LIMIT 5";

$faq = runQuery($sqlc);

foreach($faq as $k=>$v) {
/* Recuperar y almacenar en conjunto los resultados de la consulta.*/		
	$row_array['value'] = $faq[$k]['descripcion'];
	$row_array['descripcion']=$faq[$k]['descripcion'];
	
	$row_array['idx']=$faq[$k]['id_cursos'];
	$row_array['fecha_inic']=$faq[$k]['fecha_inicio'];
	$row_array['hora_inic']=$faq[$k]['hora_inicio'];
	$row_array['hora_fi']=$faq[$k]['hora_fin'];
//	$row_array['email']=$faq[$k]['Email'];
	
	array_push($return_arr,$row_array);
}
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
}
?>