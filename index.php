<?php
header('Content-Type: text/event-stream');
header('X-Accel-Buffering: no');
header('Cache-Contro: no-cache');
header('Connection: keep-alive');
header('Access-Control-Allow-Origin: *');

while (true) {
	
	print("ping...\n<br>");
	ob_flush();
	flush();
	sleep(1);
}