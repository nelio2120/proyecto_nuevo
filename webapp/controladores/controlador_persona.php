<?php
require_once '../modelos/modelo_persona.php';
class controlador{
    

public function create(){
    $mod = new modelo_p();
    $mod->setNombre($_POST['nombre']);
    $mod->setApellido($_POST['apellido']);
    $mod->setEdad($_POST['edad']);
    $mod->create();
}
public function select(){
    
    $mod = new modelo_p();
    
    $apellido = $_POST['apellido'];
    
    $results = $mod->select($apellido);
    return $results;
}
public function select_associative(){
    
    $mod = new modelo_p();
    
    $apellido = $_POST['apellido'];
    
    $results = $mod->select_associative($apellido);
    return $results;
}
public function update()
{}

public function delete()
{} }
?>