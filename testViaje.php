<?php
include_once("viaje.php");
include_once("pasajeros.php");
include_once("pasajeroVip.php");
include_once("pasajerosEsp.php");
include_once("responsableV.php");

$objViaje = new Viaje(0, 0, 0, array(), null, 0);

$salir = false;

while($salir == false){
    echo "Menú de opciones: \n";
    echo "1- Ingresar información del viaje \n";
    echo "2- Modificar información del viaje \n";
    echo "3- Agregar responsable del viaje \n";
    echo "4- Modificar datos del resposable del viaje \n";
    echo "5- Agregar pasajero \n";
    echo "6- Modificar datos del pasajero \n";
    echo "7- Ver datos del viaje \n";
    echo "8- Salir \n";
    echo "Elija una opción: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            //pide ingresar datos del viaje
            echo "Ingrese el código del viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            echo "Ingrese el precio del pasaje: ";
            $precioPasaj = trim(fgets(STDIN));
            $objViaje -> setCodigo($codigo);
            $objViaje -> setDestino ($destino);
            $objViaje -> setMaxPasajeros($maxPasajeros); 
            $objViaje -> setCostoViaje($precioPasaj);          
            echo "Se cargaron los datos correctamente. \n";
            break;
        
        case 2:
            //modificar datos del viaje
            echo "Ingrese el nuevo código: ";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino: ";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la nueva cantidad máxima de pasajeros: ";
            $maxPasajeros = trim(fgets(STDIN));
            echo "Ingrese el nuevo precio del pasaje: ";
            $precioPasaj = trim(fgets(STDIN));
            $objViaje -> setCodigo($codigo);
            $objViaje -> setDestino ($destino);
            $objViaje -> setMaxPasajeros($maxPasajeros);
            $objViaje -> setCostoViaje($precioPasaj);
            echo "Se modificaron los datos correctamente. \n";
            break;
        case 3:
            //agregar responsable
            echo "Número de empleado: ";
            $numE = trim(fgets(STDIN));
            echo "Número de licencia: ";
            $numL = trim(fgets(STDIN));
            echo "Nombre: ";
            $nomb = trim(fgets(STDIN));
            echo "Apellido: ";
            $apell = trim(fgets(STDIN));
            $objViaje-> responsable($numE, $numL, $nomb, $apell);
            echo "Se agregó correctamente. \n";
            break;

        case 4:
            //se modifican los datos del responsable
            echo "Ingrese el número de empleado: ";
            $numE = trim(fgets(STDIN));
            echo "Ingrese el nuevo número de licencia: ";
            $numL = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre: ";
            $nomb = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido: ";
            $apell = trim(fgets(STDIN));
            $modE = $objViaje-> modificarResponsable($numE);
            if($modE == true){
                echo "Se modificaron los datos correctamente. \n";
                $objViaje-> responsable($numE, $numL, $nomb, $apell);
            } else {
                echo "No existe ese empleado \n";
            }
            break;

        case 5: 
            //Agrega un pasajero
            $cantP = 0;
            for ($cantP=0; $cantP < $maxPasajeros ; $cantP++) { 
            echo "Ingrese el tipo de pasajero (estandar/ vip/ especial): ";
            $tipoPasaj = trim(fgets(STDIN));
            if($tipoPasaj == "estandar"){
                echo "Ingrese el nombre: ";
                $nomP = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apllP = trim(fgets(STDIN));
                echo "Ingrese el número de documento: ";
                $docP = trim(fgets(STDIN));
                echo "Ingrese el número de télefono: ";
                $numTel = trim(fgets(STDIN));
                echo "Ingrese el número de asiento: ";
                $nroAsiento = trim(fgets(STDIN));
                echo "Número de ticket: ";
                $numTicket = trim(fgets(STDIN));
                $objPasajero = new Pasajeros($nomP, $apllP, $docP, $numTel, $nroAsiento, $numTicket);    
                $verificarP = $objViaje-> verificarPasajero($objPasajero);                
                        
                if($verificarP == false){
                   $agregarPasajero = $objViaje->venderPasaje($objPasajero);
                   echo "Se agregó correctamente. \n";
                   echo "El precio del pasaje es: ". $agregarPasajero. "\n";
                } else {
                   echo "El pasajero con DNI ". $docP. " ya existe.\n";
                }

            } elseif($tipoPasaj =="vip"){
                echo "Ingrese el nombre: ";
                $nomP = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apllP = trim(fgets(STDIN));
                echo "Ingrese el número de documento: ";
                $docP = trim(fgets(STDIN));
                echo "Ingrese el número de télefono: ";
                $numTel = trim(fgets(STDIN));
                echo "Ingrese el número de asiento: ";
                $nroAsiento = trim(fgets(STDIN));
                echo "Número de ticket: ";
                $numTicket = trim(fgets(STDIN));
                echo "Número de viajero frecuente: ";
                $numViajeroFrecuente = trim(fgets(STDIN));
                echo "Cantidad de millas: ";
                $cantMillas = trim(fgets(STDIN));
                $objPasajeroVip = new PasajeroVip($nomP, $apllP, $docP, $numTel, $nroAsiento, $numTicket, $numViajeroFrecuente, $cantMillas);
                $verificarP = $objViaje-> verificarPasajero($objPasajeroVip);                
                        
                if($verificarP == false){
                    $agregarPasajero = $objViaje->venderPasaje($objPasajeroVip);
                    echo "Se agregó correctamente. \n";
                    echo "El precio del pasaje es: ". $agregarPasajero. "\n";
                } else {
                   echo "El pasajero con DNI ". $docP. " ya existe.\n";
                }

            } elseif($tipoPasaj == "especial"){               
                echo "Ingrese el nombre: ";
                $nomP = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apllP = trim(fgets(STDIN));
                echo "Ingrese el número de documento: ";
                $docP = trim(fgets(STDIN));
                echo "Ingrese el número de télefono: ";
                $numTel = trim(fgets(STDIN));
                echo "Ingrese el número de asiento: ";
                $nroAsiento = trim(fgets(STDIN));
                echo "Número de ticket: ";
                $numTicket = trim(fgets(STDIN));
                echo "Cuantos servicios especiales necesita?: \n";
                $servEsp = trim(fgets(STDIN));
                $objPasajeroEsp = new PasajeroEsp($nomP, $apllP, $docP, $numTel, $nroAsiento, $numTicket, $servEsp);
                $verificarP = $objViaje-> verificarPasajero($objPasajeroEsp);                
                        
                if($verificarP == false){
                    $agregarPasajero = $objViaje->venderPasaje($objPasajero);
                    echo "Se agregó correctamente. \n";
                    echo "El precio del pasaje es: ". $agregarPasajero. "\n";
                } else {
                   echo "El pasajero con DNI ". $docP. " ya existe.\n";
                }
            }
        }
            break;

        case 6:
            //permite modificar los datos del pasajero
            echo "Ingrese el número de documento: ";
            $docP = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre: ";
            $nomP = trim(fgets(STDIN));
            echo "Ingrese el nuevo apellido: ";
            $apllP = trim(fgets(STDIN));
            echo "Ingrese el nuevo télefono: ";
            $numTel = trim(fgets(STDIN));
            echo "Ingrese el nuevo número de asiento: ";
            $nroAsiento = trim(fgets(STDIN));
            $modP = $objViaje-> modificarPasajeros($docP);
            if($modP == true){
                echo "Se modificaron los datos correctamente. \n";
                $objPasajero-> setNombre($nomP);
                $objPasajero-> setApellido($apllP);
                $objPasajero-> setTelefono($numTel);
                $objPasajero-> setNumAsiento($nroAsiento);
            } else {
                echo "No hay ningun pasajero con el DNI: ". $docP."\n";
            }
            break;

        case 7:
            //permite ver los datos del viaje
            echo "Código del viaje: ". $codigo. "\n";
            echo "Destino: ". $destino. "\n";
            echo "Cantidad máxima de pasajeros: ". $maxPasajeros. "\n";
            echo "Datos del responsable: \n";
            $resp = $objViaje->getObjResponsableV();
            echo "". $resp. "\n";
            echo "Datos de los pasajeros: ";
            $arrayPasaj = $objViaje-> getCollPasajeros();
            print_r($arrayPasaj);
            break;

        case 8:
            $salir = true;
            break;


    }
}

