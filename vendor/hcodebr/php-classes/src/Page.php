<?php  

namespace Hcode;

use Rain\Tpl;

class Page{

	private $tpl;
	private $options = [];
	private $defaults = [
		"data"=>[]
	];

	public function __construct($opts = array(), $tpl_dir = "/views/"){ //header

		$this->options = array_merge($this->defaults, $opts);//mescla arrays o ultimo sempre sobrescreva os primeiros

		$config = array(
			"tpl_dir"=> $_SERVER["DOCUMENT_ROOT"].$tpl_dir, //traz a pasta root do app
			"cache_dir"=> $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
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