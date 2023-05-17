<?php
class Viaje{
    //atributos
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $CollPasajeros = array();
    private $objResponsableV;
    private $costoViaje;

    //constructor
    public function construct($codigo, $destino, $maxPasajeros, $CollPasajeros, $objResponsableV,$costoViaje){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->CollPasajeros = $CollPasajeros;
        $this->objResponsableV = $objResponsableV;
        $this->costoViaje = $costoViaje;
    }

    //metodos de acceso
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }
    public function getCollPasajeros(){
        return $this->CollPasajeros;
    }
    public function getObjResponsableV(){
        return $this->objResponsableV;
    }
    public function getCostoViaje(){
        return $this->costoViaje;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setMaxPasajeros($maxPasajeros){
        $this->maxPasajeros = $maxPasajeros;
    }
    public function setCollPasajeros($CollPasajeros){
        $this->CollPasajeros = $CollPasajeros;
    }
    public function setObjResponsableV($objResponsableV){
        $this->objResponsableV = $objResponsableV;
    }
    public function setCostoViaje($costoViaje){
        $this->costoViaje = $costoViaje;
    }

    /**
     * verifica que los pasajeros no esten repetidos
     * @param object $objPasajeros
     * @return boolean
     */
    public function verificarPasajero($objPasajeros){
        $arrayPasaj = $this-> getCollPasajeros();
        $count = count($arrayPasaj);
        $existe = false;
        $i = 0;
        $dni = $objPasajeros->getNroDoc();
        while ($i < $count && $existe == false){
            $pasaj = $arrayPasaj[$i];
            $dniP = $pasaj->getNroDoc();
            if($dniP == $dni){
                $existe = true;
            }
            $i++;
         } 

        return $existe;         
    }

    
    /**
     * permite modificar a los pasajeros
     * @param float $dni
     * @return boolean
     */
    public function modificarPasajeros($dni){
        $arrayPasaj = $this->getCollPasajeros();
        $c = count($arrayPasaj);
        $encontrado = false;
        $i = 0;

        while($i < $c && $encontrado == false){
            $pasaj = $arrayPasaj[$i];
            $doc = $pasaj->getNroDoc();
            if ($doc == $dni) {
                $encontrado = true;
            }
            $i++;
        }       
        return $encontrado;
    }

    
    /**
     * verifica si hay lugar
     * @return boolean
     */
    public function hayPasajesDisponible(){
        $cantidadMax = $this->getMaxPasajeros();
        $arrayPasaj = $this->getCollPasajeros();
        $count = count($arrayPasaj);
        $hayLugar = false;
        if($cantidadMax >= $count){
            $hayLugar = true;
        }
        return $hayLugar;
    }
    /**
     * vende un pasaje
     * @param object $objPasajero
     * @return float
     */
    public function venderPasaje($objPasajero){
        $arrayPasaj = $this-> getCollPasajeros();
        $porcentajeIncremento = $objPasajero->darPorcentajeIncremento();
        $costo = $this->getCostoViaje();        
        $hayPasajes = $this-> hayPasajesDisponible();
        if($hayPasajes == true){
            $precioFinal = $costo + ($costo * ($porcentajeIncremento / 100));
            $this-> setCostoViaje($precioFinal);
            $arrayPasaj[] = $objPasajero;
            $this->setCollPasajeros($arrayPasaj);
        }
        return $precioFinal;

    } 

    /**
     * crea el objeto responsable
     * @param int $numEmp
     * @param int $numLic
     * @param string $nom
     * @param string $apell
     */
    public function responsable($numEmp, $numLic, $nom, $apell){
        $objResponsableV = new ResponsableV($numEmp, $numLic, $nom, $apell);
        $this->setObjResponsableV($objResponsableV); 
    }

    /**
     * permite modificar al responsable del viaje
     * @param int $numEmp
     * @return boolean
     */
    public function modificarResponsable($numEmp){
        $resp = $this->getObjResponsableV();      
        $existe = false;
          if($resp-> getNumEmpleado() == $numEmp){
            $existe = true;
        }        
        return $existe;
    }

    public function __toString(){
        return "". $this->getCodigo(). 
               "". $this->getDestino(). 
               "". $this->getMaxPasajeros(). 
               "". $this->getCollPasajeros(). 
               "". $this->getObjResponsableV(). 
               "". $this->getCostoViaje();
        
    }




}
