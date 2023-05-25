<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ShipProvider
{
    public function __construct(
        private readonly HttpClientInterface $httpClient
    )
    {
    }

    public function getShips(?string $focus = null): array
    {
        $url = 'https://robertsspaceindustries.com/ship-matrix/index';

        $response = $this->httpClient->request('GET', $url);
        if (200 !== $response->getStatusCode()) {
            // throw new Exception('Error while fetching ship matrix');
            return [];
        }

        $rawShip = $response->toArray(false)['data'];

        if ($focus) {
            $rawShip = array_values(
                array_filter($rawShip, static function ($ship) use ($focus) {
                    // filtre where string focus contain string $focus (case insensitive)
                    return str_contains(strtolower($ship['focus']), strtolower($focus));
                })
            );
        }

        return $rawShip;
    }

    public function getshipById(?int $shipId): ?array
    {
        if (!$shipId) {
            return null;
        }
        $url = sprintf('https://robertsspaceindustries.com/ship-matrix/index?id=%d', $shipId);

        $response = $this->httpClient->request('GET', $url);
        if (200 !== $response->getStatusCode()) {
            // throw new Exception('Error while fetching ship matrix');
            return [];
        }

        return $response->toArray(false)['data'][0] ?? null;

    }
}
