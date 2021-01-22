<?php

namespace Hcode;

/* extends - herda da classe Page */

class PageAdmin extends Page {
	
	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{
		/*parent - chama o método construct da classe Page */
		/* se n passar opts e tpl_dir diferente, por padrão ele chama do views/admin*/
		
		parent::__construct($opts, $tpl_dir);
		
	}
	
	
}
?>


