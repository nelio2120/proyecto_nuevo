<?php
Class Administrador {
private $id_administrador;
Private $nombre;
Private $apelido;
Private $cedula;
Private $usuario;
Private $contraseña;
Private $estado;
private $datos;

/**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

/**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

Public function getnombre() { 
Return $this->nombre;
}
Public function setnombre($nombre){
$this->nombre= nombre;
}
Public function getapellido() { 
Return $this->apellido;
}
Public function setapellido($apellido){
$this->apellido= apellido;
}
Public function getcedula() { 
Return $this->cedula;
}
Public function setusuario($usuario){
$this->usuario= usuario;
}
Public function getcontraseña() { 
Return $this->contraseña;
}
Public function setcontraseña($contraseña){
$this->nombre= contraseña;
}

Public function getnombre() { 
Return $this->nombre;
}
Public function setnombre($nombre){
$this->nombre= nombre;
}
Public function getestado() {
    Return $this->nombre;
}
Public function setestado($estado){
    $this->estado= estado;
}



Public function select ($id_administrador){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contraseña=$_POST['contraseña_p'];
    $estado=$_POST['estado_p'];
   
}
Public function insert ($id_administrador){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contraseña=$_POST['contraseña_p'];
    $estado=$_POST['estado_p'];
    
    
}
Public function Update ($idprofesor){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contrseña=$_POST['contraseña_p'];
    
    
}
Public function delete ($id_profesor){
    $estado = 0;
}
}