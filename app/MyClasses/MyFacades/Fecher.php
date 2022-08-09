<?php
namespace App\MyClasses;

class Fecher 
{
	protected static function resolveFacade($name){
		return app()[$name];
	}
	public static function __callStatic($method,$args){
		return self::resolveFacade('DataFech')->$method(...$args);
		
	}
	
}
  ?>