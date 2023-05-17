<?php 
class Pasajeros{
    //atributos
    private $nombre;
    private $apellido;
    private $nroDoc;
    private $telefono;
    private $numAsiento;
    private $nroTicket;

    //constructor
    public function __construct($nombre, $apellido, $nroDoc, $telefono, $numAsiento, $nroTicket){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDoc = $nroDoc;
        $this->telefono = $telefono;      
        $this->numAsiento = $numAsiento;
        $this->nroTicket = $nroTicket; 
    }

    //metodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDoc(){
        return $this->nroDoc;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function getNroTicket(){
        return $this->nroTicket;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setNumAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }
    public function setNroTicket($nroTicket){
        $this->nroTicket = $nroTicket;
    }

    //tostring
    public function __toString(){
        return "Nombre: ". $this->getNombre(). "\n".
               "Apellido: ". $this->getApellido(). "\n". 
               "Número de documento: ". $this->getNroDoc(). "\n".  
               "Número de telefono: ". $this->getTelefono(). "\n". 
               "Numero de asiento: ". $this->getnumAsiento(). "\n". 
               "Número de ticket: ". $this->getnroTicket();
    }
    
     /**
     * retorne el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return int
     */
    public function darPorcentajeIncremento(){
        $importe = 10;
        return $importe;
    }



}