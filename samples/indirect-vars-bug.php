<?php

abstract class AsyncTask{
	private static $threadLocalStorage = null;

	protected function storeLocal(string $key, $complexData) : void{
		if(self::$threadLocalStorage === null){
			self::$threadLocalStorage = new \ArrayObject();
		}
		self::$threadLocalStorage[spl_object_id($this)][$key] = $complexData;
	}

	final public function __destruct(){
		$this->reallyDestruct();
		if(self::$threadLocalStorage !== null and isset(self::$threadLocalStorage[$h = spl_object_id($this)])){
			unset(self::$threadLocalStorage[$h]);
			if(self::$threadLocalStorage->count() === 0){
				self::$threadLocalStorage = null;
			}
		}
	}

	protected function reallyDestruct() : void{

	}
}

class Task extends AsyncTask{
	public function __construct(){
		$this->storeLocal("thing1", new stdClass);
	}
}

for($i = 0; $i < 10000; ++$i){
	new Task;
}
echo "OK\n";
