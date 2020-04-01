<?php 
class publicacion_controlador{
private $id_pub;
private $titulo;
private $mensaje;
private $fecha_pu;


public function __construct()
    {}

    public function getId_pub()
    {
        return $this->id_pub;
    }
public function getTutulo()
    {
        return $this->titulo;
    }
public function getMensaje()
    {
        return $this->mensaje;
    }
    public function getFecha_pu()
    {
        return $this->fecha_pu;
    }
    
    
    
public function setId_pub($id_pub)
    {
        $this->id_pub = $id_pub;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    
    
    public function setFecha_pu($fecha_pu)
    {
        $this->fecha_pu = $fecha_pu;
    }
    

public function insert($id_pub){

$titulo= $_Post[‘titulo’];
$mensaje= $_Post[‘mensaje’];
$fecha_pu= $_Post[‘fecha_pu’];
}

 public function update($id_pub){

$titulo= $_Post[‘titulo’];
$mensaje= $_Post[‘mensaje’];
$fecha_pu= $_Post[‘fecha_pu’];
 }



 public function delete ($id_pub){

$titulo= $_Post[‘titulo’];
$mensaje= $_Post[‘mensaje’];
$fecha_pu= $_Post[‘fecha_pu’];
}

}
?>