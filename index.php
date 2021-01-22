<?php 

session_start();
require_once("vendor/autoload.php");  

use \Slim\Slim;       //namespace
use \Hcode\Page;      //namespace
use \Hcode\PageAdmin; //namespace
use \Hcode\Model\User;

$app = new Slim();	

$app->config('debug',true);

$app->get('/', function() 
{
     
     $page = new Page();     //chama o construct e vai adicionar o reader na tela

     $page->setTpl("index");  //chama o arquivo o <h1>Hello!</h1> que o arquivo index.html, arquivo principal de conteúdo	 	
	
	
});


$app->get('/admin', function()
{
	
	// User::verifyLogin();
	
	 $page = new PageAdmin();
	 
	 $page->setTpl("index");
	
});
		
		
$app->get('/admin/login', function() 
{ 
	 
     $page = new PageAdmin([
	      "header"=>false,        //desabilita o header e o footer qdo chama o login
		  "footer"=>false		  
	 ]);  
	 	 
	  $page->setTpl("login");
	
});	


$app->post('/admin/login', function() 
{ 
     User::login($_POST["login"], $_POST["password"]);  //recebe os dados de login e senha do formulário login.html
	
	 header("Location: /admin");                        //não havendo erro ao logar, redireciona para a pagina principal do admin
	 exit;                                              //para a execução aqui 
});	


$app->get('/admin/logout', function()
{
	
	User::logout();
	
	header("Location: /admin/login");
	exit;
	
});

$app->run();
		 
	
?>
 
 
	