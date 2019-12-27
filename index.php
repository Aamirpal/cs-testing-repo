<?php

while (true) {
	header('Content-Type: text/event-stream');
	header('X-Accel-Buffering: no');
	header('Cache-Contro: no-cache');
	header('Connection: keep-alive');
	header('Access-Control-Allow-Origin: *');
	
	echo "ping...\n<br>";
	ob_flush();
	flush();
	sleep(1);
}