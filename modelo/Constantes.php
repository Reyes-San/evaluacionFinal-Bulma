<?php

namespace modelo;

// Definir la configuración fuera de la clase
define('BD_HOST', '');
define('BD_USER', '');
define('BD_PASS', '');
define('BD_NAME', '');

/**
 * Clase para las constantes a utilizar
 */
class Constantes
{

	// Definir las constantes dentro de la clase
	const BD_HOST = '';
	const BD_USER = '';
	const BD_PASS = '';
	const BD_NAME = '';

	public static function getHost()
	{
		return self::BD_HOST;
	}

	public static function getUser()
	{
		return self::BD_USER;
	}

	public static function getPass()
	{
		return self::BD_PASS;
	}

	public static function getName()
	{
		return self::BD_NAME;
	}
}
