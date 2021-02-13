<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;

$discord = new Discord(['token' => 'LongTokenHere,Not needed to reproduce PHP8 Problem.']);

$discord->on('ready', function (Discord $discord) {
	var_dump("PROBLEM NOT REPRODUCED.");
});

$discord->run();