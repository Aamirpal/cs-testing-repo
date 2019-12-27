<?php
header('Content-Type: text/event-stream');
header('X-Accel-Buffering: no');
header('Cache-Contro: no-cache');
header('Connection: keep-alive');
header('Access-Control-Allow-Origin: *');

for($i=0; $i<=20; $i++) {
	echo ': ' . sha1(mt_rand()) . "\n\n";
	ob_flush();
	flush();
	sleep(1);
}