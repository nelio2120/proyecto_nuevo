<?php

class modelo_p{
    private $id_persona;
    private $nombre;
    private $apellido;
    private $edad;
    private $telefono;
    private $usuario;
    private $contrasena;
    private $rol;
    
    
    
    /**
     * @return mixed
     */
    public function getId_persona()
    {
        return $this->id_persona;
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
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
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
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $id_persona
     */
    public function setId_persona($id_persona)
    {
        $this->id_persona = $id_persona;
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
     * @param mixed $edad
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
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

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    function create() {
        ;
    }
    public function select($apellido)
    {
        $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.edad, p.telefono
        FROM Persona p
        WHERE p.apellido like '" . $apellido . "'";
        
        $conn= new mysqli("localhost","root","root", "aula_virtual");
        $query = $conn->query($sql);
        
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
        $conn->close();
        return $resultSet;
        
        
    }
    public function select_associative($apellido)
{
    $sql = "SELECT p.id_persona, p.nombre, p.apellido, p.edad
        FROM Persona p
        WHERE p.apellido like '" . $apellido . "'";
    
    $conn= new mysqli("localhost","root","", "aula_virtual");
    $query = $conn->query($sql);
    
    if($query==true){
        if($query->num_rows>1){
            while($row = $query->fetch_assoc()) {
                $resultSet[]=$row;
            }
        }elseif($query->num_rows==1){
            if($row = $query->fetch_assoc()) {
                $resultSet=$row;
            }
        }else{
            $resultSet=true;
        }
    }else{
        $resultSet=false;
    }
    $conn->close();
    return $resultSet;
    
    }
    public function update()
    {}
    
    public function delete()
    {} }
    ?>