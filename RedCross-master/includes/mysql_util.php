<?php
    
  function mysql_insert_Alumno($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 45 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';

        return mysqli_query($conexion, $query);
     }   
    
  function mysql_insert_Admin($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 29 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        return mysqli_query($conexion, $query);
    }
	
	function mysql_insert_Maestro($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 31 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';

        return mysqli_query($conexion, $query);
    }

    function mysql_update($table, $conexion, $inserts, $matricula) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 45 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn ,array_values($inserts));
        $keys = array_keys($inserts);
       	
        $sql = "UPDATE $table SET ";

       	for ($i = 0; $i < count($keys); $i++) {
        	$sql = $sql . " " . $keys[$i] . "='" . $values[$i] ."'";
        	if($i < count($keys)-1){
        		$sql = $sql . ", ";
        	}
    	}

    	$sql = $sql . " WHERE id_" . $table . "=" . $matricula;

        return mysqli_query($conexion, $sql);
    }
?>
