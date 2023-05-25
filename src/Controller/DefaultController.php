<?php

namespace App\Controller;

use App\Form\MiningConfiguratorType;
use App\Helper\ShipHelper;
use App\Model\MiningConfigurator;
use App\Service\RawData\MiningLasers;
use App\Service\ShipProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(ShipProvider $shipProvider, Request $request): Response
    {
        $miningShips = $shipProvider->getShips('mining');
//        dump($miningShips);
//        foreach ($miningShips as $miningShip) {
//            dump($miningShip['name']);
//            dump($miningShip);
//            dump(ShipHelper::getMiningMounts($miningShip));
//            dump(ShipHelper::getTractorBeamMounts($miningShip));
//        }

        $miningConfigurator = new MiningConfigurator();
        $form = $this->createForm(MiningConfiguratorType::class, $miningConfigurator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($miningConfigurator);
        }

        $miningLAsers = MiningLasers::getMiningLasersFromCSV();
        return $this->render('default/index.html.twig', [
            'miningLAsers' => $miningLAsers,
            'form' => $form->createView(),
            'miningConfigurator' => $miningConfigurator,
        ]);
    }
}
