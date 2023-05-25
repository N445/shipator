<?php

namespace App\Service\FormHelper;

use App\Entity\MiningLaser;
use App\Helper\ShipHelper;
use App\Service\RawData\MiningLasers;
use App\Service\ShipProvider;
use App\Tool\ArrayTool;

class ChoicesValuesProvider
{
    public function __construct(
        private readonly ShipProvider $shipProvider
    )
    {
    }

    public function getMiningShips(): array
    {
        $miningShips = $this->shipProvider->getShips('mining');
        $choices = [];
        foreach ($miningShips as $ship) {
            $choices[$ship['name']] = $ship['id'];
        }
        return $choices;
    }

    public function getMiningLasers(?int $shipId): array
    {
        if ($shipId) {
            $ship = $this->shipProvider->getshipById($shipId);
            $sizes = ShipHelper::getAllSizes($ship);
        }
        $miningLasers = MiningLasers::getMiningLasersFromCSV();

        // filter mining laser where mining laser are <= $sizes
        $miningLasers = array_filter($miningLasers, static function (MiningLaser $miningLaser) use ($sizes) {
            foreach ($sizes as $size) {
                if ($miningLaser->getSize() <= $size) {
                    return true;
                }
            }
            return false;
        });

        $choices = [];
        foreach ($miningLasers as $miningLaser) {
            $choices[sprintf('%s (size %d)', $miningLaser->getName(), $miningLaser->getSize())] = $miningLaser->getName();
        }
        return $choices;
    }
}
