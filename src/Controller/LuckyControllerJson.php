<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/quote")]
    public function slumpmassigtCitatIndex(): Response
    {
        $citat = [
            "Carpe diem - Horatius",
            "To be successful, you have to be willing to do things that others are not willing to do. - Michael Jordan",
            "It is not what you look at that matters, it is what you see. - Henry David Thoreau"
        ];

        $citat = $citat[array_rand($citat)];

        $data = [
            'dagens citat' => $citat,
            'dagens datum' => date('Y-m-d'),
            'timestamp' => time(),
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );

        return $response;
    }
}
