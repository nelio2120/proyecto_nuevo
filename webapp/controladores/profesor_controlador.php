<?php
Class Profesor {
Private $id_profesor;
Private $nombre;
Private $apelido;
Private $curso;
Private $cedula;
Private $usuario;
Private $contraseña;
Private $fecharegistrousuario;

/**
     * @return mixed
     */
    public function getRegistrousuario()
    {
        return $this->fecharegistrousuario;
    }

/**
     * @param mixed $registrousuario
     */
    public function setfechaRegistrousuario($fecharegistrousuario)
    {
        $this->fecharegistrousuario = $fecharegistrousuario;
    }

Public function getnombre() { 
Return $this->nombre;
}
Public function setapellido($apellido){
$this->apellido= apellido;
}

Public function getcurso() { 
Return $this->curso;
}
Public function setcurso($curso){
$this->curso= curso;
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
Public function select ($idprofesor){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $curso=$_POST['curso_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contrseña=$_POST['contraseña_p'];
    $registrousuario=$_POST['fecharegistrousuario_p'];
    
}
Public function insert ($id_profesor){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $curso=$_POST['curso_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contrseña=$_POST['contraseña_p'];
    $registrousuario=$_POST['fecharegistrousuario_p'];

    
}
Public function Update ($idprofesor){
    $nombre=$_POST['nombre_p'];
    $apellido=$_POST['apellido_p'];
    $curso=$_POST['curso_p'];
    $cedula=$_POST['cedula_p'];
    $usuario=$_POST['usuario_p'];
    $contrseña=$_POST['contraseña_p'];
    $registrousuario=$_POST['fecharegistrousuario_p'];

}
Public function delete ($id_estudiante){
    $estado= 0;
}
}