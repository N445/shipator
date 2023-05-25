<?php

namespace App\Helper;

class ShipHelper
{
    public static function getAllSizes(array $ship): array
    {
        $sizes = [];
        $rsiWeapons = $ship['compiled']['RSIWeapon'] ?? [];
        foreach ($rsiWeapons as $key => $item) {
            foreach ($item as $mont) {
                if (str_contains($mont['name'], 'Mining Laser')) {
                    $sizes[] = $mont['size'];
                }
            }
        }
        return $sizes;
    }

    public static function getMiningMounts(array $ship): array
    {
        $miningMounts = [];
        $rsiWeapons = $ship['compiled']['RSIWeapon'] ?? [];
        foreach ($rsiWeapons as $key => $item) {
            foreach ($item as $mont) {
                if (str_contains($mont['name'], 'Mining Laser')) {
                    $miningMounts[] = $mont;
                }
            }
        }
        return $miningMounts;
    }

    public static function getMaxMountBySizes(array $ship): array
    {
        $miningMounts = self::getMiningMounts($ship);
        $nbMaxMountBySizes = [];
        foreach ($miningMounts as $miningMount) {
            $size = $miningMount['size'];
            if (!array_key_exists($size, $nbMaxMountBySizes)) {
                $nbMaxMountBySizes[$size] = 0;
            }
            $nbMaxMountBySizes[$size] = $nbMaxMountBySizes[$size] + ((int)$miningMount['mounts'] * (int)$miningMount['quantity']);
        }
        return $nbMaxMountBySizes;
    }

    public static function getTractorBeamMounts(array $ship): array
    {
        $miningMounts = [];
        $rsiWeapons = $ship['compiled']['RSIWeapon'] ?? [];
        foreach ($rsiWeapons as $key => $item) {
            foreach ($item as $mont) {
                if (str_contains($mont['name'], 'Tractor Beam')) {
                    $miningMounts[] = $mont;
                }
            }
        }
        return $miningMounts;
    }
}