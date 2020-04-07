<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

  	
  	include "config.php";
  	include "utils.php";
  	$json=file_get_contents('php://input');
  	$data=json_decode($json);
  	$dbConn= connect($db);
		$sql = "SELECT * FROM calendar where exam_state<>'eliminado' and exam_state <> 'finalizado' order by users asc";
		//$sql = "SELECT * FROM patient";
		$result = pg_query($sql) or die('La consulta fallo:'.pg_last_error());
		//echo json_encode(pg_fetch_array($result,PGSQL_ASSOC));
		$arra = (pg_fetch_all($result,PGSQL_ASSOC));
		
		//echo var_dump($arra);
		foreach ($arra as $valor){
			echo '<a href="http://localhost:4200/informes/'.$valor['id'].'">'.$valor['date_c'].' '.$valor['description'].'</a> <br>';
		}
?>