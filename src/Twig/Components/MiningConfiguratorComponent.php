<?php

namespace App\Twig\Components;

use App\Form\MiningConfiguratorType;
use App\Model\MiningConfigurator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('mining_configurator')]
final class MiningConfiguratorComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    #[LiveProp(useSerializerForHydration: true, fieldName: 'data')]
    public MiningConfigurator $miningConfigurator;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(MiningConfiguratorType::class, $this->miningConfigurator);
    }


}
