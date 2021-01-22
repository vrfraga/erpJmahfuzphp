<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \PDO;


class User extends Model {
	
	
	const SESSION = "User";
	

	//método estático que recebe o login e a senha do usuário
	public static function login($login,$password)
	{
 
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
             
 
/*      
        global $pdo;

        $sql = "SELECT *
                FROM jm_cad_usuario_frm
                WHERE nome=:nome AND senha=:senha";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':senha',$senha);
        $stmt->execute();
        $resultadoUsuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoUsuario;
*/
     
            $stmt = $conn->prepare("SELECT * FROM jm_cad_usuario_frm WHERE nome=:LOGIN");
			//$stmt = $pdo->prepare($sql);	       	
			$stmt->bindValue(':LOGIN',$login);	  	
			//$stmt->bindValue(':PASSWORD',$password);		  	
            $stmt->execute();		 
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		   // var_dump($result); 
		    return($result);				  				
         
 
    
		if (count($result) === 0 )
		{
			throw new \Exception("Usuário Inexistente ou Senha Inválida");
			
		}
		
		$data = $result[0];
		
		if (password_verify($password, $data["SENHA"]) === true)
		{
			$user = new User();
			
			$user->setData($data);
			
			$_SESSION[User::SESSION] = $user->getValues();
			
			return $user;           		
						
		}else {
			throw new \Exception("Usuário Inexistente e ou Senha Inválida");
			
		}
		
	}
	
/*	public static function verifyLogin($admin = true)
	{
		if (
		    !isset($_SESSION[User::SESSION])                         //se exist a sessão
			||
			!$_SESSION[User::SESSION]                                //se sessão é falsa
			||
			!(int)$_SESSION[User::SESSION]["coduser"] > 0               //se o usuário n for maior que zero
			||
			(bool)$_SESSION[User::SESSION]["admin"] !== $admin      //se o usuário é da adm
		){
			header("Location: /admin/login");                        //redireciona pro login
			exit;
			
		}
		
		
	}
*/	
	public static function logout()
	{
		
		$_SESSION[User::SESSION] = NULL;
		
	}
	
	
}


?>