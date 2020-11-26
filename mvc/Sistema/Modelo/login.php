
<?php

	class login_modelo{

		private $bd;

		public function __construct(){
			require 'conexionPDO.php';
			$this->bd= $conexionPDO;
			session_start();
		}

		public function getUsuario($dni){
			$sql = "SELECT * FROM cliente WHERE dni=:dni";

			$stmtPDO = $this->bd->prepare($sql);
			$stmtPDO->bindParam(':dni', $dni);

			
			return $stmtPDO;
		}

	}
?>
