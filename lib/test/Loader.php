<?php

namespace test;

class Loader
{
    protected static $_libdir = 'lib';

    public static function init()
    {
        return spl_autoload_register(array(__CLASS__, 'includeClass'));
    }

    public static function includeClass($class)
    {
		$classFile = PROJECTROOT . '/' . self::$_libdir . '/' . strtr($class, '\\', '/') . '.php';
		if( file_exists($classFile) ) {
			require_once($classFile);
		}
		else {
			echo 'Error 404: Not Found';
			exit;
		}
    }
}

function S($class)
{
    $class = __NAMESPACE__ . '\\' . $class;
    return $class::getInstance();
}
