<?php
//CONEXION
include 'mainService.php';

class AlumnoService extends MainService {

    function findGrades($codAlumno){
        return $this->conex->query("SELECT a.NOMBRE, c.NOTA1, c.NOTA2, c.NOTA3, 
        c.NOTA4, c.NOTA5, c.NOTA6, c.NOTA7, c.NOTA8, c.NOTA9, c.NOTA10 FROM 
        ASIGNATURA a, ALUMNO_ASIGNATURA_PERIODO c WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA 
        AND c.COD_ALUMNO =".$codAlumno);
    }
    
    function findSubjet($codAlumno){
        return $this->conex->query("SELECT a.NOMBRE, a.COD_ASIGNATURA FROM ASIGNATURA a, ALUMNO_ASIGNATURA_PERIODO c
        WHERE a.COD_ASIGNATURA = c.COD_ASIGNATURA 
        AND c.COD_ALUMNO =".$codAlumno);
    }
    
    function findSubjetByCode($codAsignatura){
        return $this->conex->query("SELECT NOMBRE FROM ASIGNATURA 
        WHERE COD_ASIGNATURA =".$codAsignatura);
    }

    function findAll(){
        return $this->conex->query("SELECT DETALLE_COMUNICADO FROM COMUNICADO_ASIGNATURA");
    }

    function findRelease($codAsignatura){
        //$conex = getConection();
        return $this->conex->query("SELECT DETALLE_COMUNICADO FROM COMUNICADO_ASIGNATURA
        WHERE COD_ASIGNATURA =".$codAsignatura);
    }
    function findAssistance($codAlumno){
        return $this->conex->query("SELECT FECHA, ESTADO FROM ASISTENCIA_PERIODO WHERE COD_ALUMNO =".$codAlumno);
    }

    function findByPK($codCliente){
        //$conex = getConection();
        $result = $this->conex->query("SELECT * FROM CLIENTE WHERE cod_cliente=".$codCliente);
        if ($result->num_rows > 0) {
            $row1 = $result->fetch_assoc();
            return $row1;
        }else{
            return null;
        }
    }

}
?>