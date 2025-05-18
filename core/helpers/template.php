<?php

class Template{

	function __construct($str) {
		$this->template = $str;
	}

	private function sanear_diccionario(&$dict) {
		settype($dict, 'array'); 
		$dict2 = $dict;
		foreach($dict2 as $key=>$value) {
			if(is_object($value) or is_array($value)) {
				unset($dict[$key]);
			}
		}
	}

	private function set_dict(&$dict) {
		$this->sanear_diccionario($dict); 
		$dict2 = $dict;
		foreach($dict2 as $key=>$value) {
			$dict["{{$key}}"] = $value;
			unset($dict[$key]);
		}
	}
	
	// metodod de sustitusion directa
	function render($dict) {
		$this->set_dict($dict);
		return str_replace(array_keys($dict), array_values($dict), $this->template);
	}

	// metodod de sustitusion iteractiva
	function render_regex($dict, $id) {
		$regex = "/<!--$id-->(.|\n){1,}<!--$id-->/";
		preg_match($regex, $this->template, $matches);
		$strorig = $this->template;
		$this->template = $matches[0];
		$render = '';
		foreach($dict as $possible_obj) {
			$render .= $this->render($possible_obj);
		}
		$render = str_replace("<!--$id-->", '', $strorig);
		return str_replace($this->template, $render, $strorig);
	}

}

?>
