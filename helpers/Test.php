<?php

class Test{

	public static function doSomething() : void{
		$time = time();
		while(time() < $time + 10){}
		echo "done\n";
	}
}
