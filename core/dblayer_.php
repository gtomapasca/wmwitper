<?php

require_once 'DBsettings.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DBObject {
	protected static $conn; # Objeto conector mysqli
	protected static $stmt; # preparación de la consulta SQL
	# Objeto Reflexivo de mysqli_stmt
	protected static $reflection;
	protected static $sql; # Sentencia SQL a ser preparada
	# Array conteniendo los tipo de datos
	# más los datos a ser enlazados
	# (será recibido como parámetro)
	protected static $data;
	# Colección de datos retornados por una consulta
	# de selección
	public static $results;

	// Conección a base de datos
	protected static function conectar() {
		echo "<p>DB conectar...</p>";
		self::$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		echo "<br />";
		print_r(self::$conn);
	}

	// Preparar   una   sentencia   SQL   (con   marcadores   de parámetros):
	protected static function preparar() {
		echo "<p>sql: " . self::$sql . "</p>";
		self::$stmt = self::$conn->prepare(self::$sql);
		echo "<br /> stmt01: ";
		print_r(self::$stmt);
		self::$reflection = new ReflectionClass('mysqli_stmt');
		echo "<br /> ";
		echo "<br /> reflection: ";
		print_r(self::$reflection);
	}

	// Enlazar los datos con la sentencia SQL preparada:
	protected static function set_params() {
		$method = self::$reflection->getMethod('bind_param');
		$method->invokeArgs(self::$stmt,self::$data);

		//echo "<p> data: " . self::$data . "</p>";
		//echo "<p> stmt: " . self::$stmt . "</p>";
		echo "<br />";
		echo "<br /> method: ";
		print_r($method);
		echo "<br /> stmt02: ";
		print_r(self::$stmt);
		echo "<br /> data: ";
		print_r(self::$data);
	}

	// Enlazar resultados de una consulta de selección:
	protected static function get_data($fields) {
		echo "<br />";
		echo "<br /> fields: ";
		print_r($fields);
		/*20201227: Se comenta al no enlazar correctamente
		$method = self::$reflection->getMethod('bind_result');
		$method->invokeArgs(self::$stmt, $fields);
		*/
		echo "<br />";
		echo "<br /> stmt02: ";
		print_r(self::$stmt);

		// GTP-INI
		
		echo "<br />";
		//print_r(self::$stmt);
		// gtp 20201227: se agrega metodo de enlace opcional
		$result = array();
		$md = self::$stmt->result_metadata();
		echo "<br /> md: ";
		print_r($md);
		echo "<br />";
		while($field = $md->fetch_field()) {
			$fields[$field->name] = &$result[$field->name];
			echo "<br />";
			echo $field->name . " = ";
			echo $result[$field->name];
		}
		echo "<br />";
		echo "<br />";
		print_r($fields);
		echo "<br />";
		echo "<br />";
		print_r(self::$stmt);
		
		print_r($varResul);
		//call_user_func_array(array(self::$stmt, 'bind_result'), $fields);
		call_user_func_array(array(self::$stmt, 'bind_result'), array_values($fields));
		// GTP-FIN

		
		while(self::$stmt->fetch()) {
			echo "GTPX-while...";
			self::$results[] = unserialize(serialize($fields));
		}
	}

	protected static function finalizar() {
		self::$stmt->close();
		self::$conn->close();
	}

	public static function ejecutar($sql, $data, $fields=False) {
		//echo "<p>DB ejecutar...</p>";
		//echo "<p>sql: ".$sql."</p>";
		//echo "<p>data: ".$data."</p>";
		//echo "<p>fields: ".$fields."</p>";
		self::$sql = $sql; 	# setear la propiedad $sql
		self::$data = $data; 	# setear la propiedad $data
		self::conectar(); 	# conectar a la base de datos
		self::preparar(); 	# preparar la consulta SQL
		self::set_params(); 	# enlazar los datos
		self::$stmt->execute(); # ejecutar la consulta

		if($fields) {	
			self::get_data($fields);
			return self::$results;
		} else {
			if(strpos(self::$sql, strtoupper('INSERT')) === 0) {
				return self::$stmt->insert_id;
			}
		}
		self::finalizar(); # cerrar conexiones abiertas
	}

}


?>
