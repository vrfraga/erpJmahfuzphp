<?php 

require_once("vendor/autoload.php");  

use \Slim\Slim;       //namespace
use \Hcode\Page;      //namespace

$app  = new Slim();	

$app->get('/', function() 
{
     
     $page = new Page();     //chama o construct e vai adicionar o reader na tela

     $page->setTpl("index");  //chama o arquivo o <h1>Hello!</h1> que o arquivo index.html, arquivo principal de conteúdo	 	
	
	
});
			
		

 $app->run();
		 
	
?>
 
 
	