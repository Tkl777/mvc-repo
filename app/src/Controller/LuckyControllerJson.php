<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
     #[Route("/api/quote")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 2);
        if ($number == 0) {
            $quote = "Det är klokare att gå sin egen väg än att gå vilse i andras fotspår.";
        } elseif ($number == 1) {
            $quote ="Följ det som fångar ditt hjärta, inte det som fångar dina ögon.";
        } else {
            $quote ="Om du kan drömma det så kan du uppnå det.";
        }


        date_default_timezone_set('Europe/Stockholm');


        $date = date('Y-m-d , H:i:s');

        $data = [
            'quote-of-the-day' => $quote,
            'date' =>$date,
        ];

        //return new JsonResponse($data);
        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    
    

}