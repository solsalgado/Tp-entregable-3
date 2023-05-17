<?php 

class PasajeroEsp extends Pasajeros{
    //atributos
    private $servicioEspecial;

    //constructor
    public function __construct($nombre, $apellido, $nroDoc, $telefono, $numAsiento, $nroTicket, $servicioEspecial){
        parent :: __construct($nombre, $apellido, $nroDoc, $telefono, $numAsiento, $nroTicket);
        $this->servicioEspecial = $servicioEspecial;   
    }

    //metodos de acceso

    public function getServicioEspecial(){
        return $this->servicioEspecial;
    }

    public function setServicioEspecial($servicioEspecial){
        $this->servicioEspecial = $servicioEspecial;
    }

    //tostring
    public function __toString(){
        $cadena = parent :: __toString();
        $cadena = "". $this->getServicioEspecial();
        return $cadena;            
    }

    /**
     * retorne el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return int
     */
    public function darPorcentajeIncremento(){
        $servicioEsp = $this->getServicioEspecial();
        $importe = parent ::darPorcentajeIncremento();
        if($servicioEsp > 1){
            $incremento = 30;
        } else{
            $incremento = $importe + 5;
        }
        return $incremento;
    }


}