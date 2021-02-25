<?php

$exit = 0;
foreach(scandir(__DIR__ . '/samples/') as $file){
	if($file === "." || $file === ".."){
		continue;
	}
	$ret = -1;
	passthru(PHP_BINARY . " " . __DIR__ . "/samples/$file", $ret);
	if($ret !== 0){
		echo "FAILED: $file ($ret)\n";
		$exit = 1;
	}else{
		echo "PASSED: $file\n";
	}
}
exit($exit);
