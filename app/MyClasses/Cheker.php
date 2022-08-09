<?php
namespace App\MyClasses;

class Cheker 
{
	protected static function resolveFacade($name){
		return app()[$name];
	}
	public static function __callStatic($method,$args){
		return self::resolveFacade('DataService')->$method(...$args);
		
	}
	
}
  ?>