<?php

namespace App\Entity;

use App\Repository\MiningLaserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MiningLaserRepository::class)]
class MiningLaser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column]
    private ?int $optimumRange = null;

    #[ORM\Column]
    private ?int $maxRange = null;

    #[ORM\Column]
    private ?int $minPower = null;

    #[ORM\Column]
    private ?int $maxPower = null;

    #[ORM\Column]
    private ?int $extractionPower = null;

    #[ORM\Column]
    private ?int $nbModuleSlot = null;

    #[ORM\Column]
    private ?int $resistance = null;

    #[ORM\Column]
    private ?int $instablity = null;

    #[ORM\Column]
    private ?int $optimalChargeRate = null;

    #[ORM\Column]
    private ?int $optimalChargeWindow = null;

    #[ORM\Column]
    private ?int $inertMaterial = null;

    #[ORM\Column(type: Types::JSON)]
    private array $buyingLocations = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getOptimumRange(): ?int
    {
        return $this->optimumRange;
    }

    public function setOptimumRange(int $optimumRange): self
    {
        $this->optimumRange = $optimumRange;

        return $this;
    }

    public function getMaxRange(): ?int
    {
        return $this->maxRange;
    }

    public function setMaxRange(int $maxRange): self
    {
        $this->maxRange = $maxRange;

        return $this;
    }

    public function getMinPower(): ?int
    {
        return $this->minPower;
    }

    public function getMinPowerPercent(): ?int
    {
        return ($this->minPower / $this->maxPower) * 100;
    }

    public function setMinPower(int $minPower): self
    {
        $this->minPower = $minPower;

        return $this;
    }

    public function getMaxPower(): ?int
    {
        return $this->maxPower;
    }

    public function setMaxPower(int $maxPower): self
    {
        $this->maxPower = $maxPower;

        return $this;
    }

    public function getExtractionPower(): ?int
    {
        return $this->extractionPower;
    }

    public function setExtractionPower(int $extractionPower): self
    {
        $this->extractionPower = $extractionPower;

        return $this;
    }

    public function getNbModuleSlot(): ?int
    {
        return $this->nbModuleSlot;
    }

    public function setNbModuleSlot(int $nbModuleSlot): self
    {
        $this->nbModuleSlot = $nbModuleSlot;

        return $this;
    }

    public function getResistance(): ?int
    {
        return $this->resistance;
    }

    public function setResistance(int $resistance): self
    {
        $this->resistance = $resistance;

        return $this;
    }

    public function getInstablity(): ?int
    {
        return $this->instablity;
    }

    public function setInstablity(int $instablity): self
    {
        $this->instablity = $instablity;

        return $this;
    }

    public function getOptimalChargeRate(): ?int
    {
        return $this->optimalChargeRate;
    }

    public function setOptimalChargeRate(int $optimalChargeRate): self
    {
        $this->optimalChargeRate = $optimalChargeRate;

        return $this;
    }

    public function getOptimalChargeWindow(): ?int
    {
        return $this->optimalChargeWindow;
    }

    public function setOptimalChargeWindow(int $optimalChargeWindow): self
    {
        $this->optimalChargeWindow = $optimalChargeWindow;

        return $this;
    }

    public function getInertMaterial(): ?int
    {
        return $this->inertMaterial;
    }

    public function setInertMaterial(int $inertMaterial): self
    {
        $this->inertMaterial = $inertMaterial;

        return $this;
    }

    public function getBuyingLocations(): array
    {
        return $this->buyingLocations;
    }

    public function setBuyingLocations(array $buyingLocations): self
    {
        $this->buyingLocations = $buyingLocations;

        return $this;
    }
}

