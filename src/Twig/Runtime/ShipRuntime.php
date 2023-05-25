<?php

namespace App\Twig\Runtime;

use App\Helper\ShipHelper;
use Twig\Extension\RuntimeExtensionInterface;

class ShipRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function media_url(string $url): string
    {
        if (!str_contains($url, 'https://media.robertsspaceindustries.com')) {
            $url = 'https://robertsspaceindustries.com' . $url;
        }
        return $url;
    }

    public function get_mining_mounts(array $ship): array
    {
        return ShipHelper::getMiningMounts($ship);
    }

    public function get_tractor_beam_mounts(array $ship): array
    {
        return ShipHelper::getTractorBeamMounts($ship);
    }
}
