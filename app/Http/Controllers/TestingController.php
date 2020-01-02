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
        if (ob_get_level() == 0) ob_start();
        for ($i = 0; $i<10; $i++){

            echo "<br> Line to show.";
            echo str_pad('',4096)."\n";    

            ob_flush();
            flush();
            sleep(2);
        }

        echo "Done.";

        ob_end_flush();
    }
}