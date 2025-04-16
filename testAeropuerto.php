<?php

include_once 'aerolinea.php';
include_once 'aeropuerto.php';
include_once 'persona.php';
include_once 'vuelo.php';

$aerolinea1 = new Aerolinea(23, "Juanma");
$aerolinea2 = new Aerolinea(51, "Lucas");

$vuelo1 = new Vuelo(2145, 675, "2025-06-12", "París", "18:45", "07:20", 180, 34, $persona);
$vuelo2 = new Vuelo(3987, 1050, "2025-06-05", "Londres", "09:15", "23:30", 200, 98, $persona);
$vuelo3 = new Vuelo(5210, 880, "2025-05-28", "Sídney", "02:00", "13:45", 250, 76, $persona);
$vuelo4 = new Vuelo(6701, 740, "2025-06-01", "Nueva York", "06:10", "18:00", 220, 143, $persona);

$aerolinea1->incorporarVuelo($vuelo1);
$aerolinea1->incorporarVuelo($vuelo2);
$aerolinea2->incorporarVuelo($vuelo3);
$aerolinea2->incorporarVuelo($vuelo4);

$objAeropuerto = new Aeropuerto("Chos Malal", 77);
$objAeropuerto->setColAerolineas([$aerolinea1, $aerolinea2]);

$objAeropuerto->ventaAutomatica(3,"2025-06-12" ,"Paris");

$identificacion = 23;

$promedio = $aeropuerto->promedioRecaudadoPorAerolinea($identificacion);