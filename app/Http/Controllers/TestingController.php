<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\Response;

class TestingController extends Controller
{
    private static function sendEvent($event_name, $data) {
        echo "event: $event_name\n";
        echo "data: $data\n\n";
        flush();
        ob_flush();
    }

    public function streamNotifications()
    {
        ob_end_clean();
        $timeout = env('NOTIFICATION_STREAM_TIMEOUT', 8);
        $response = new StreamedResponse(function() use ($timeout) {
            // send an initial event to keep the connection alive
            $count = 0;
            while ($count < 10) {
                echo "event: ping".time()."\n";
                echo "data: ping\n\n";
                flush();
                usleep(1000000);
                $count++;
            }
        }, Response::HTTP_OK, array(
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Connection' => 'keep-alive',
            'Access-Control-Allow-Origin' => '*'
        ));
        
        return $response;
    }
}