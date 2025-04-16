<?php

class Aerolinea{
    private $identificacion; 
    private $nombre; 
    private $colVuelosProgramados = []; 

    //metodo constructor
    public function __construct($identificacion,  $nombre)
    {$this->identificacion = $identificacion;
    $this->nombre = $nombre;
    $this->colVuelosProgramados = [];
    }

    //metodos de accesos(getters)
    public function getIdentificacion() {return $this->identificacion;}

	public function getNombre() {return $this->nombre;}

    public function getColVuelosProgramados() {return $this->colVuelosProgramados;}

    //metodos de acceso(setters)
	public function setIdentificacion( $identificacion): void {$this->identificacion = $identificacion;}

	public function setNombre( $nombre): void {$this->nombre = $nombre;}

    public function setColVuelosProgramados($vuelos): void {$this->colVuelosProgramados = $vuelos;}
	

    public function darVueloADestino($destino, $cant_asientos){
        $coleccionVuelos = []; //Inicializo array de vuelos.
        $coleccionVuelosAerolinea = $this->getColVuelosProgramados(); //Consigo la coleccion de vuelos disponibles.
        foreach($coleccionVuelosAerolinea as $unObjVuelo) { //Recorro los obj de la coleccion
            $elDestino = $unObjVuelo->getDestino(); //Almaceno el destino
            $cantDisponible = $unObjVuelo->getAsientosDisponibles(); //Almaceno los asientos disp del vuelo
            if($elDestino == $destino && $cant_asientos <= $cantDisponible){ //Si el destino coincide y la cantidad de asientos es adecuada, guardo el vuelo en la coleccion.
                $coleccionVuelos[] = $unObjVuelo; //guardo el vuelo
        }   
    }
        return $coleccionVuelos;//retorno la col.
        
    }
    public function incorporarVuelo($unVuelo){
        $coleccionVuelosAerolinea = $this->getColVuelosProgramados();
        $incorpora = true; // Inicializo la variable en false
        $cantidadVuelos = count($coleccionVuelosAerolinea); //Guardo la cantidad de vuelos en la coleccion
        $i = 0;
        while($i < $cantidadVuelos && $incorpora == true){
            $vuelo = $coleccionVuelosAerolinea[$i];
            $elDestino = $vuelo->getDestino();
            $fecha = $vuelo->getFecha();
            $horarioPartida= $vuelo->getHoraPartida();
            if($elDestino == $unVuelo->getDestino() && $fecha == $unVuelo->getFecha() && $horarioPartida == $unVuelo->getHoraPartida()){ 
                $incorpora = false;
            }
            $i++;
        }
        if($incorpora){
            $coleccionVuelosAerolinea[] = $unVuelo;
            $this->setColVuelosProgramados($coleccionVuelosAerolinea);
        }
        return $incorpora;
    }

    public function venderVueloADestino($cant_asientos, $destino, $fecha){
        $encontrado = null;
        $coleccionVuelosAerolinea = $this->getColVuelosProgramados();
        $cantidadVuelos = count($coleccionVuelosAerolinea);
        $i = 0;
        while($encontrado == null && $i < $cantidadVuelos){
            $vuelo = $coleccionVuelosAerolinea[$i];
            $elDestino = $vuelo->getDestino();
            $fecha1 = $vuelo->getFecha();
            $asientos = $vuelo->getAsientosDisponibles();
            if($asientos >= $cant_asientos && $fecha == $fecha1 && $destino == $elDestino){
                $encontrado = $vuelo;
                $vuelo-> asignarAsientosDisponibles($cant_asientos);
            }
            $i++;
        }
        return $encontrado;
    }
    public function montoPromedioRecaudado() {
        $promedio = 0;
        $vuelos = $this->coleccionVuelos;
        $totalVuelos = count($vuelos);
        $recaudacionTotal = 0;
    
        if ($totalVuelos > 0) {
            foreach ($vuelos as $vuelo) {
                $importe = $vuelo->importe;
                $asientosVendidos = $vuelo->cantAsientosTotales - $vuelo->cantAsientosDisponibles;
                $recaudadoVuelo = $importe * $asientosVendidos;
    
                $recaudacionTotal += $recaudadoVuelo;
            }
    
            $promedio = $recaudacionTotal / $totalVuelos;
        }
    
        return $promedio;
    }
}