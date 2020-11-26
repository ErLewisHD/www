<?php
	try{
		$conexionPDO= new PDO("mysql:host=localhosto; dbname=partyflowers; charset=utf8", "root","");
		$conexionPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e) {
		header('Location: ../Vista/error.html');
		exit;
	}
?>
