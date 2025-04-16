<?php

class Persona{
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    //metodo constructor
    public function __construct( $nombre,  $apellido,  $direccion,  $mail,  $telefono)
    {$this->nombre = $nombre;$this->apellido = $apellido;$this->direccion = $direccion;$this->mail = $mail;$this->telefono = $telefono;}

    //metodos de acceso(getters)
	public function getNombre() {return $this->nombre;}

	public function getApellido() {return $this->apellido;}

	public function getDireccion() {return $this->direccion;}

	public function getMail() {return $this->mail;}

	public function getTelefono() {return $this->telefono;}

    //metodos de acceso(setters)
	public function setNombre( $nombre): void {$this->nombre = $nombre;}

	public function setApellido( $apellido): void {$this->apellido = $apellido;}

	public function setDireccion( $direccion): void {$this->direccion = $direccion;}

	public function setMail( $mail): void {$this->mail = $mail;}

	public function setTelefono( $telefono): void {$this->telefono = $telefono;}

	
}