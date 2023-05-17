<?php 

class PasajeroVip extends Pasajeros{
    //atributos
    private $nroViajeroRecurrente;
    private $millas;

    //constructor
    public function __construct($nombre, $apellido, $nroDoc, $telefono, $numAsiento, $nroTicket, $nroViajeroRecurrente, $millas){    
        parent :: __construct($nombre, $apellido, $nroDoc, $telefono, $numAsiento, $nroTicket);
        $this->nroViajeroRecurrente = $nroViajeroRecurrente;
        $this->millas = $millas;
    }

    //metodos de acceso

    public function getNroViajeroRecurrente(){
        return $this->nroViajeroRecurrente;
    }
    public function getMillas(){
        return $this->millas;
    }


    public function setNroViajeroRecurrente($nroViajeroRecurrente){
        $this->nroViajeroRecurrente = $nroViajeroRecurrente;
    }
    public function setMillas($millas){
        $this->millas = $millas;
    }

    //tostring
    public function __toString(){
        $cadena = parent :: __toString();
        $cadena = "". $this->getNroViajeroRecurrente(). "\n". 
                  "". $this->getMillas();
        return $cadena;           
    }

    /**
     * retorne el porcentaje que debe aplicarse como incremento según las características del pasajero
     * @return int
     */
    public function darPorcentajeIncremento(){
        $cantMillas = $this->getMillas();
        $importe = parent ::darPorcentajeIncremento();
        if($cantMillas > 300){
            $incremento = 30;
        } else{
            $incremento = $importe + 25;
        }
        return $incremento;
    }


}