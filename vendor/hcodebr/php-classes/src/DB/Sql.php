<?php 

namespace Hcode\DB;

//require_once("conexao.php");
require_once("vendor/autoload.php");
$app = new \Slim\Slim();




class Sql {

//private $conn;
 
 public function __construct()
 
 
      /*   $tns = "(DESCRIPTION =
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
		*/		
				

    public function select($sql) {
        $stmt = $this->stmt->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($sql) {
        $stmt = $this->stmt->prepare($sql);
        try {
            $result = $stmt->execute();
        } catch (PDOException $e) {
            trigger_error('Error occured while trying to insert into the DB:' . $e->getMessage(), E_USER_ERROR);
        }
        if ($result) {
            return $stmt->rowCount();
        }
    }

    function __destruct() {
        $this->stmt = NULL;
    }

}

$stmt = new Sql; 

$stmt->select($select_sql);
$stmt->insert($insert_sql);


?>