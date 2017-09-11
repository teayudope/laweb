<?php

$_lineas = array();
$_sublineas = array();

//LINEAS
$temp = new stdClass();
$temp->id = 1;
$temp->name = 'Luminarias Led';
$_lineas[] = $temp;

$temp = new stdClass();
$temp->id = 2;
$temp->name = 'Paneles Solares';
$_lineas[] = $temp;

$temp = new stdClass();
$temp->id = 3;
$temp->name = 'Digital Signage';
$_lineas[] = $temp;

$temp = new stdClass();
$temp->id = 4;
$temp->name = 'Seguridad Electronica';
$_lineas[] = $temp;


/************************************************************************************/

//SUBLINEAS

//Iluminarias Led $id = 1
$temp = new stdClass();
$temp->id = 1;
$temp->linea_id = 1;
$temp->name = 'Cintas Led';
$temp->image = '1-cinta-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 2;
$temp->linea_id = 1;
$temp->name = 'Modulos Led';
$temp->image = '2-modulo-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 3;
$temp->linea_id = 1;
$temp->name = 'Bombillas Led';
$temp->image = '3-bombilla.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 4;
$temp->linea_id = 1;
$temp->name = 'Dicroico Led';
$temp->image = '4-dicroico.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 5;
$temp->linea_id = 1;
$temp->name = 'Par Led';
$temp->image = '5-par-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 6;
$temp->linea_id = 1;
$temp->name = 'Tubos Led';
$temp->image = '6-tubo-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 7;
$temp->linea_id = 1;
$temp->name = 'Equipos Lineales Led';
$temp->image = '7-equipo-lineal.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 8;
$temp->linea_id = 1;
$temp->name = 'Reflectores Led';
$temp->image = '8-reflector.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 9;
$temp->linea_id = 1;
$temp->name = 'Paneles Led';
$temp->image = '9-panel-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 10;
$temp->linea_id = 1;
$temp->name = 'Accesorios Led';
$temp->image = '10-accesorio-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 11;
$temp->linea_id = 1;
$temp->name = 'Luces de Emergencia Led';
$temp->image = '11-luz-de-emergencia.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 12;
$temp->linea_id = 1;
$temp->name = 'Foco de Automovil Led';
$temp->image = '12-foco-para-automovil-led.png';
$_sublineas[] = $temp;

//Paneles Solares $id = 2
$temp = new stdClass();
$temp->id = 14;
$temp->linea_id = 2;
$temp->name = 'Panel Solar';
$temp->image = '14-panel-solar.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 16;
$temp->linea_id = 2;
$temp->name = 'Controlador Solar';
$temp->image = '16-controlador-solar.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 18;
$temp->linea_id = 2;
$temp->name = 'Inversor Solar';
$temp->image = '18-inversor-solar.png';
$_sublineas[] = $temp;

//Digital Signage $id = 3
$temp = new stdClass();
$temp->id = 19;
$temp->linea_id = 3;
$temp->name = 'Pantallas Led';
$temp->image = '19-pantalla-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 20;
$temp->linea_id = 3;
$temp->name = 'Totem';
$temp->image = '20-totem-led.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 21;
$temp->linea_id = 3;
$temp->name = 'VideoWall';
$temp->image = '21-video-wall.png';
$_sublineas[] = $temp;

//Seguridad Electronica $id = 4
$temp = new stdClass();
$temp->id = 22;
$temp->linea_id = 4;
$temp->name = 'Alarmas';
$temp->image = '22-alarma-de-incendio.png';
$_sublineas[] = $temp;

$temp = new stdClass();
$temp->id = 23;
$temp->linea_id = 4;
$temp->name = 'Sirenas';
$temp->image = '23-sirena.png';
$_sublineas[] = $temp;
