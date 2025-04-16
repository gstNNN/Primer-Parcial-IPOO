<?php

class Aeropuerto{
    private $denominacion;
    private $direccion;
    private $colAerolineas = [];

    //constructor
    public function __construct( $denominacion,  $direccion){$this->denominacion = $denominacion;$this->direccion = $direccion;}
	
    //metedos de acceso(getters)
    public function getDenominacion() {return $this->denominacion;}

	public function getDireccion() {return $this->direccion;}

	public function getColAerolineas() {return $this->colAerolineas;}

    //metodos de acceso(setters)
    public function setDenominacion( $denominacion): void {$this->denominacion = $denominacion;}

	public function setDireccion( $direccion): void {$this->direccion = $direccion;}

    public function setColAerolineas($aerolinea): void {$this->colAerolineas = $aerolinea;}

    public function agregarAerolinea($aerolinea): void {
        $this->colAerolineas[] = $aerolinea;  // Agregar una aerolínea a la colección
    }
    
    //metodo __toString
    public function __toString() {
        $aerolineas = "";
        $i = 0;
        $aerolineasCol = $this->getColAerolineas();
        $cantidadAerolienas = count($aerolineasCol);
        while($i < $cantidadAerolienas){
            $aerolineas .= $aerolineasCol[$i];
            if ($i < $cantidadAerolienas - 1) {
                $aerolineas .= ", ";
            }
            $i++;
        }
        return 
        "Denominacion: " . $this->getDenominacion() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" .
        "Aerolineas: " . $aerolineas . "\n";
    }

    public function retornarVuelosAerolinea($unaAerolinea){
        $coleccionAerolineas = $this->getColAerolineas();
        $vuelosAerolinea = "";
        foreach($coleccionAerolineas as $aerolinea){
            $vuelos = $aerolinea->getVuelos();
            $cantVuelos = count($vuelos);
            if($cantVuelos>0){
                foreach ($vuelos as $vuelo) {
                    $vuelosAerolinea .= "Vuelo: " . $vuelo->getCodigo() . "Origen: " .
                    $vuelo->getOrigen() . "Destino: " . $vuelo->getDestino() . "\n";
            }
        } else {
            $vuelosAerolinea .= "No hay vuelos para esta aerolínea.";
        }
    }
    return $vuelosAerolinea; 
}

    public function ventaAutomatica($cantidadAsientos, $fecha, $destino) {
        $vuelosAsignados = [];
        foreach ($this->colAerolineas as $aerolinea) {
            $vuelos = $aerolinea->getVuelos();
            foreach ($vuelos as $vuelo) {
            if ($vuelo->getDestino() == $destino && $vuelo->getFecha() == $fecha) {
                if ($vuelo->asignarAsientosDisponibles($cantidadAsientos)) {
                    $vuelosAsignados[] = $vuelo;
                    }
                }
            }
        }
        if (count($vuelosAsignados) > 0) {
        $mensaje = "Asientos asignados: ";
        foreach ($vuelosAsignados as $vuelo) {
            $mensaje .= $vuelo->getNumero() . " ";
        }
        return $mensaje;
    } else {
        return "No hay vuelos disponibles";
    }
}   
    public function promedioRecaudadoXAerolinea($idAerolinea) {
        $totalRecaudado = 0;
        $cantidadVuelos = 0;

        foreach ($this->colAerolineas as $aerolinea) {
            if ($aerolinea->getId() == $idAerolinea) {
                $vuelos = $aerolinea->getVuelos();
                foreach ($vuelos as $vuelo) {
                    $totalRecaudado += $vuelo->getImporte();
                    $cantidadVuelos++;
                }
            }
        }

        if ($cantidadVuelos > 0) {
            return $totalRecaudado / $cantidadVuelos;
        } else {
            return "No se encontraron vuelos para esta aerolínea.";
        }
    }
    public function promedioRecaudadoPorAerolinea($idBuscado) {
        $aerolineas = $this->getColAerolineas();
        $suma = 0;
        $promedio = 0;
    
        foreach ($aerolineas as $aerolinea) {
            if ($aerolinea->getIdentificacion() == $idBuscado) {
                $suma += $aerolinea->montoPromedioRecaudado();
            }
        }
    
        if ($suma > 0) {
            $promedio = $suma;
        }
    
        return $promedio;
    }
}