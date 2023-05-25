<?php

namespace App\Model;

class MiningConfigurator
{
    private ?int $shipId = null;
    private ?array $ship = null;
    private ?array $miningLasers = [];

    /**
     * @return int|null
     */
    public function getShipId(): ?int
    {
        return $this->shipId;
    }

    /**
     * @param int|null $shipId
     * @return MiningConfigurator
     */
    public function setShipId(?int $shipId): MiningConfigurator
    {
        $this->shipId = $shipId;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getShip(): ?array
    {
        return $this->ship;
    }

    /**
     * @param array|null $ship
     * @return MiningConfigurator
     */
    public function setShip(?array $ship): MiningConfigurator
    {
        $this->ship = $ship;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getMiningLasers(): ?array
    {
        return $this->miningLasers;
    }

    /**
     * @param array|null $miningLasers
     * @return MiningConfigurator
     */
    public function setMiningLasers(?array $miningLasers): MiningConfigurator
    {
        $this->miningLasers = $miningLasers;
        return $this;
    }

    /**
     * @param string|null $miningLaser
     * @return MiningConfigurator
     */
    public function addMiningLaser(?string $miningLaser): MiningConfigurator
    {
        $this->miningLasers[] = $miningLaser;
        return $this;
    }
}
