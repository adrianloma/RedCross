<?php
    

    function mysql_insert_Alumno($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 47 ; $i++)
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

    function mysql_insert_permiso($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 16 ; $i++)
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

    function mysql_insert_curso($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 10 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';

        return mysqli_query($conexion, $query);
    }

    function mysql_insert_carrera($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 3 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        
        return mysqli_query($conexion, $query);
    }

    function mysql_insert_semestre($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 1 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        
        return mysqli_query($conexion, $query);
    }
    
    function mysql_insert_periodo($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 2 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        
        return mysqli_query($conexion, $query);
    }

    function mysql_insert_grupo($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 2 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        
        return mysqli_query($conexion, $query);
    }

    function mysql_insert_inscritos($table, $conexion, $inserts) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 3 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn , array_values($inserts));
        $keys = array_keys($inserts);

        $query = 'INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')';
        
        return mysqli_query($conexion, $query);
    }

    function mysql_update($table, $conexion, $updates, $matricula) {

        $conn = array($conexion);
        
        for($i = 0 ; $i < 47 ; $i++)
            array_push($conn, $conexion);

        $values = array_map('mysqli_escape_string', $conn ,array_values($updates));
        $keys = array_keys($updates);
       	
        $sql = "UPDATE $table SET ";

       	for ($i = 0; $i < count($keys); $i++) {
        	$sql = $sql . " " . $keys[$i] . "='" . $values[$i] ."'";
        	if($i < count($keys)-1){
        		$sql = $sql . ", ";
        	}
    	}

        if($table == "nivel_escolar"){
            $sql = $sql . " WHERE id_nivelEscolar=" . $matricula;
        }else{
            $sql = $sql . " WHERE id_" . $table . "=" . $matricula;
        }

        return mysqli_query($conexion, $sql);
    }
	
	
	function mysql_delete($table, $conexion, $matricula) {
        $conn = array($conexion);      

        if($table == "nivel_escolar"){
            $sql = "delete from $table where id_nivelEscolar=" . $matricula;
        }else{
            $sql = "delete from $table where id_" . $table . "=" . $matricula;
        }

        return mysqli_query($conexion, $sql);
    }

    function mysql_delete_inscritos($conexion, $matricula, $id_curso) {
        $conn = array($conexion);      

        $sql = "delete from inscritos where id_alumno=" . $matricula ." and id_curso=" . $id_curso;


        return mysqli_query($conexion, $sql);
    }
?>
