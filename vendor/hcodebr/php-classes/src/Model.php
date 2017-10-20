<?php  

namespace Hcode;

class Model {

	private $values = [];

	public function __call($name, $args)
	{

		$method = substr($name, 0, 3); //pega as 3 primeiras letras, (get ou set)
		$fieldName = substr($name, 3, strlen($name)); // a partir da 3 pos ate o final

		switch ($method) {
			case 'get':
				return $this->values[$fieldName];
			break;
			
			case 'set':
				$this->values[$fieldName] = $args[0];
			break;
		}
	}

	public function setData($data = array()){

		foreach ($data as $key => $value) {
			
			$this->{"set".$key}($value); //para criar o set + nome do campo do bd tem que ser entre {}
		}
	}

	public function getValues(){

		return $this->values;
	}

}

?>