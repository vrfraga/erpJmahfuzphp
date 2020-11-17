<?php 

foreach(PDO::getAvailableDrivers() as $driver)
    echo $driver, '<br>';

//	echo phpinfo();
//echo "OK";



/*
		$tns = "  
		(DESCRIPTION =
			(ADDRESS_LIST =
			  (ADDRESS = (PROTOCOL = TCP)(HOST = 192.42.103.5)(PORT = 1521))
			)
			(CONNECT_DATA =
			  (SERVICE_NAME = DBHOM00)
			)
		  )
			   ";
			   
		static $conn;
			   
		$db_username = "prdgemco";
		$db_password = "prdgemco";

		try{
			$conn = new PDO("oci:dbname=".$tns,$db_username,$db_password);
			return $conn;
			echo "conectado com sucesso";
		}catch(PDOException $e){
			echo ($e->getMessage());
		    echo "erro de cconexao";
		}


*/


		
       
/*
		session_start();
			//$apiURL = "/components/";
			//require 'Slim/Slim.php';
			//\Slim\Slim::registerAutoloader();
			require_once("vendor/autoload.php");
			$app = new \Slim\Slim();

			function getConnection() {
				$DBHost = "192.42.103.5"; //Database Host URL or IP Address
				$DBOraclePort = "1521"; //DB Oracle Port
				$DBName = "DBHOM00"; //if MySQL use Database Name, if Oracle use Oracle System ID (SID)
				//Connection String
				//$connectionDB = "mysql:host={$DBHost};dbname={$DBName}";
				$connectionDB = "oci:dbname=(DESCRIPTION=(ADDRESS=(HOST={$DBHost})(PROTOCOL=tcp)(PORT={$DBOraclePort}))(CONNECT_DATA=(SID={$DBName})))";
				$DBUser = "prdgemco";
				$DBPswd = "prdgemco";
				$dbh = new PDO($connectionDB, $DBUser, $DBPswd);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				return $dbh;
				
			}


			$app->get('/', function() {
					$sql = "SELECT * FROM jm_cad_usuario_frm
					         where coduser = 4";
					//$jsonArray = array();
				//	try {
						$db = getConnection();
						$stmt = $db->prepare($sql);
						$stmt->execute();
						$result = $stmt->fetch(PDO::FETCH_ASSOC);
					
						echo json_encode($result);
				
				}

			);					
			
			
		

         $app->run();
		 
*/			 
	
 ?>