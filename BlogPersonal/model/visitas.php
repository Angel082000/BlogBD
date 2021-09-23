<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Realizar Conexion a BD
// Realizar consulta SQL
class visitas {

    public $nombre;
    public $edad;
    public $ciudad;

    public function __construct($nombre, $edad, $ciudad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->ciudad = $ciudad;
    }

    public static function consultar() {
        include ('conexion.php');
        $consulta = "select * from visitas";
        echo ('<br>');
        // echo ($consulta);
        $resultado = mysqli_query($mysqli, $consulta);
        if (!$resultado) {
            echo 'No pudo Realizar la consulta a la base de datos';
            exit;
        }
        $listaAlumnos = [];
        while ($visitas = mysqli_fetch_array($resultado)) {
            $listaAlumnos[] = new visitas($visitas['nombre'], $visitas['edad'], $visitas['ciudad']);
        }
        return $listaAlumnos;
    }

}

?>
