<?php 
Class estudiante{
private $id_estudiante;
private $nombre;
private $apellido;
private $curso;
private $cedula;
private $estado;
private $materia;
private $usuario;
private $contrasena;


/**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

/**
     * @param mixed $materia
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

    /**
     * @return mixed
     */
    public function getId_estudiante()
    {
        return $this->id_estudiante;
    }

/**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

/**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

/**
     * @return mixed
     */
    public function getCurso()
    {
        return $this->curso;
    }

/**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

/**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

/**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

/**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

/**
     * @param mixed $id_estudiante
     */
    public function setId_estudiante($id_estudiante)
    {
        $this->id_estudiante = $id_estudiante;
    }

/**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

/**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

/**
     * @param mixed $curso
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

/**
     * @param mixed $cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

/**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

/**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

/**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

public function select($id_estudiante){
$nombre = $_POST['nombre_e'];
$apellido = $_POST['apellido_e'];
$curso = $_POST ['curso_e'];
$cedula = $_POST['cedula_e'];
$estaduo = $_POST['estado_e'];
$materia = $_POST['materia_e'];
}
Public function insert($id_estudiante){
$nombre = $_POST['nombre_e'];
$apellido = $_POST['apellido_e'];
$curso = $_POST['curso_e'];
$cedula = $_POST['cedula_e'];
$usuario = $_POST['usuario_e'];
$contrasena = $_POST['contrasena_e'];
$materia = $_POST['materia_e'];
}
Public function update($id_estudiante){
    $nombre = $_POST['nombre_e'];
    $apellido = $_POST['apellido_e'];
    $curso = $_POST['curso_e'];
    $cedula = $_POST['cedula_e'];
    $usuario = $_POST['usuario_e'];
    $contrasena = $_POST['contrasena_e'];
    $materia = $_POST['materia_e'];
}
Public function delete ($id_estudiante){
$estado= 0;
}

}