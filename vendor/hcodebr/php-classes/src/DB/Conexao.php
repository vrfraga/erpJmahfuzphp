<?php
//session_start();
			require_once("vendor/autoload.php");
			$app = new \Slim\Slim();
    
	        $tns = "(DESCRIPTION =
					(ADDRESS_LIST =
					  (ADDRESS = (PROTOCOL = TCP)(HOST = 192.42.103.5)(PORT = 1521))
					)
					(CONNECT_DATA =
					  (SERVICE_NAME = DBHOM00)
					)
				  )";

				$db_username = "prdgemco";
				$db_password = "prdgemco";

				try{
					$conn = new PDO('oci:dbname='.$tns.';charset=UTF8',$db_username,$db_password);
				}catch(PDOException $e){
					echo ($e->getMessage());
				}

?>