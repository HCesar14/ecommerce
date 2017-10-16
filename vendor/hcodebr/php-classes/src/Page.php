<?php  

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;
	private $options = [];
	private $defaults = [
		"data"=>[]
	];

	public function __construct($opts = array()){ //header

		$this->options = array_merge($this->defaults, $opts);//mescla arrays o ultimo sempre sobrescreva os primeiros

		$config = array(
			"tpl_dir"=> /*$_SERVER["DOCUMENT_ROOT"].*/"C:/xampp/htdocs/ecommerce/views/", //traz a pasta root do app
			"cache_dir"=> /*$_SERVER["DOCUMENT_ROOT"].*/"C:/xampp/htdocs/ecommerce/views-cache/",
			"debug"=>false
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl;

		$this->setData($this->options["data"]);

		$this->tpl->draw("header");

	}

	private function setData($data = array()){

		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}

	//conteudo do template
	public function setTpl($name, $data = array(), $returnHTML = false){

		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);
	}

	public function __destruct(){ //footer

		$this->tpl->draw("footer");
	}

}

?>