<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\ShipRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ShipExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('media_url', [ShipRuntime::class, 'media_url']),
            new TwigFilter('get_mining_mounts', [ShipRuntime::class, 'get_mining_mounts']),
            new TwigFilter('get_tractor_beam_mounts', [ShipRuntime::class, 'get_tractor_beam_mounts']),
        ];
    }
}
