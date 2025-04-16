<?php

class Vuelo{
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $asientosTotales;
    private $asientosDisponibles;
    private $responsable;

    //metodo constructor
    public function __construct( $numero,  $importe,  $fecha,  $destino,  $horaArribo,  $horaPartida,  $asientosTotales,  $asientosDisponibles,  $responsable)
    {$this->numero = $numero;$this->importe = $importe;$this->fecha = $fecha;
    $this->destino = $destino;$this->horaArribo = $horaArribo;
    $this->horaPartida = $horaPartida;$this->asientosTotales = $asientosTotales;
    $this->asientosDisponibles = $asientosDisponibles;$this->responsable = $responsable;}
	
    //metodos de acceso(getters)
    public function getNumero() {return $this->numero;}

	public function getImporte() {return $this->importe;}

	public function getFecha() {return $this->fecha;}

	public function getDestino() {return $this->destino;}

	public function getHoraArribo() {return $this->horaArribo;}

	public function getHoraPartida() {return $this->horaPartida;}

	public function getAsientosTotales() {return $this->asientosTotales;}

	public function getAsientosDisponibles() {return $this->asientosDisponibles;}

	public function getResponsable() {return $this->responsable;}

	//metodos de acceso setters
    public function setNumero( $numero): void {$this->numero = $numero;}

	public function setImporte( $importe): void {$this->importe = $importe;}

	public function setFecha( $fecha): void {$this->fecha = $fecha;}

	public function setDestino( $destino): void {$this->destino = $destino;}

	public function setHoraArribo( $horaArribo): void {$this->horaArribo = $horaArribo;}

	public function setHoraPartida( $horaPartida): void {$this->horaPartida = $horaPartida;}

	public function setAsientosTotales( $asientosTotales): void {$this->asientosTotales = $asientosTotales;}

	public function setAsientosDisponibles( $asientosDisponibles): void {$this->asientosDisponibles = $asientosDisponibles;}

	public function setResponsable( $responsable): void {$this->responsable = $responsable;}

	public function asignarAsientosDisponibles($asientosAsignarse){
        $respuesta = false;
        $cant_disp = $this->getAsientosDisponibles();
        if($asientosAsignarse <= $cant_disp){
            $respuesta = true;
        } 
        return $respuesta;
    }
    public function __toString() {
        return "Número de vuelo: " . $this->getNumero() . "\n" .
            "Importe: " . $this->getImporte() . "\n" .
            "Fecha: " . $this->getFecha() . "\n" .
            "Destino: " . $this->getDestino() . "\n" .
            "Hora de Arribo: " . $this->getHoraArribo() . "\n" .
            "Hora de Partida: " . $this->getHoraPartida() . "\n" .
            "Asientos Totales: " . $this->getAsientosTotales() . "\n" .
            "Asientos Disponibles: " . $this->getAsientosDisponibles() . "\n" .
            "Responsable: " . $this->getResponsable() . "\n";
    }
}


