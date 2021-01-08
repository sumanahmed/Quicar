<?php

namespace App\Http\Lib;

use GuzzleHttp\Client;

class Helper 
{
    public function sendSingleNotification($id, $title, $message) {
        $id     = $id;
        $title  = $title;
        $body   = $message;
        $client = new Client();
        //https://quicarbd.com/mobileapi/notification/partnerNotification.php?notification=single&title=Title here&body=body here&id=0&image=https://dyl80ryjxr1ke.cloudfront.net/external_assets/hero_examples/hair_beach_v1785392215/original.jpeg&type=1&token=dFEPwUvKRYCicAqiIuVnrz:APA91bErVnBTRnmA7_9W3MEuZB8k0AjwgTKPpTDjbS_WB8ZhI0HbAuQ78wfPV-CBWHoaQfKfYxiAATjAfEI2LF2u5JBT-N214Yn-HoksFigXJ5xbUu6ackwi6cUnD-GXdumzMXPfLK-s
        $client->request("GET", "https://quicarbd.com//mobileapi/notification/partnerNotification.php?notification=single&id=".$id."&title=".$title ."&body=".$body."&image=https://dyl80ryjxr1ke.cloudfront.net/external_assets/hero_examples/hair_beach_v1785392215/original.jpeg&type=1&token=dFEPwUvKRYCicAqiIuVnrz:APA91bErVnBTRnmA7_9W3MEuZB8k0AjwgTKPpTDjbS_WB8ZhI0HbAuQ78wfPV-CBWHoaQfKfYxiAATjAfEI2LF2u5JBT-N214Yn-HoksFigXJ5xbUu6ackwi6cUnD-GXdumzMXPfLK-s");
    }
}