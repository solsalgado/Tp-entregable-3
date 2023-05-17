<?php 
class ResponsableV{
    //atributos
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //constructor
    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;       
    }

    //metodos de acceso
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    //tostring
    public function __toString(){
        return "Numero de empleado: ". $this->getNumEmpleado(). "\n".
               "Numero de licencia: ". $this->getNumLicencia(). "\n". 
               "Nnombre: ". $this->getNombre(). "\n".  
               "Apellido: ". $this->getApellido();
    }


}