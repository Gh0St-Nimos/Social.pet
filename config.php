<?php

error_reporting(E_ERROR);


ini_set('date.timezone', 'America/Manaus');
function con (): PDO {
	//Seguindo conselho do lucas, é melhor pdo do que mysqli
	//se acha demais.
	$c = new PDO("mysql:host=147.79.95.179;dbname=u436203203_patagram", "u436203203_patagram", ">/=1mWi9tR");
	$c->query("SET time_zone = '-04:00'");
	return $c;
}

session_start();