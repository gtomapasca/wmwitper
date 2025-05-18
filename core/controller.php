<?php

class Controller{
	function __construct($recurso, $arg){
		//echo '<p>recurso: '.$recurso.'</p>';
		//echo '<p>arg: '.$arg.'</p>';
		$metodo = str_replace('-', '_', $recurso);
		//echo '<p>metodo: '.$metodo.'</p>';
		// Tiene que existir el metodo para continuar
		if(method_exists($this, $metodo)){
			call_user_func(array($this, $metodo), $arg);
		}else{
			print 'Recurso no existente';
		}
	}
}

?>
