<?php

namespace App\Service\RawData;

use App\Entity\MiningLaser;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class MiningLasers
{
    /**
     * @return MiningLaser[]
     */
    public static function getMiningLasersFromCSV(): array
    {
        $csvPath = __DIR__ . '/mining lasers - Feuille1.csv';

        $csvContent = file_get_contents($csvPath);


        $buyingLocationsCallback = static function ($innerObject, $outerObject, string $attributeName, string $format = null, array $context = []) {
            return explode(';', (string)$innerObject);
        };

        $priceCallback = static function ($innerObject, $outerObject, string $attributeName, string $format = null, array $context = []) {
            return empty($innerObject) ? null : (int)$innerObject;
        };

        $defaultContext = [
            AbstractNormalizer::CALLBACKS => [
                'buyingLocations' => $buyingLocationsCallback,
                'price' => $priceCallback,
            ],
        ];

        $normalizer = new GetSetMethodNormalizer(null, null, null, null, null, $defaultContext);


        $encoders = [new CsvEncoder()];
        $normalizers = [$normalizer, new ObjectNormalizer(), new ArrayDenormalizer()];
        $serializer = new Serializer($normalizers, $encoders);


        return $serializer->deserialize($csvContent, MiningLaser::class . '[]', 'csv');
    }
}
