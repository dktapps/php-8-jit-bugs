<?php

$exit = 0;
foreach(scandir(__DIR__ . '/samples/') as $file){
	if($file === "." || $file === ".."){
		continue;
	}
	$ret = -1;
	echo "Running test sample $file\n";
	passthru(PHP_BINARY . " " . __DIR__ . "/samples/$file", $ret);
	if($ret !== 0){
		fwrite(STDERR, "FAILED: $file ($ret)\n");
		$exit = 1;
	}else{
		echo "PASSED: $file\n";
	}
}
if($exit !== 0){
	fwrite(STDERR, "Some tests failed\n");
}
exit($exit);
