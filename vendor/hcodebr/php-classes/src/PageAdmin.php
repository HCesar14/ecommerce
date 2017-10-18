<?php  

namespace Hcode;

class PageAdmin extends Page {

	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{

		parent::__construct($opts, $tpl_dir); //chama o metodo construtor da classe que foi extendida passando os parametros desse construtor

	}

}

?>