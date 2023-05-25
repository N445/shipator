<?php

namespace App\Form;

use App\Model\MiningConfigurator;
use App\Service\FormHelper\ChoicesValuesProvider;
use App\Service\ShipProvider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MiningConfiguratorType extends AbstractType
{
    public function __construct(
        private readonly ChoicesValuesProvider $choicesValuesProvider,
        private readonly ShipProvider          $shipProvider
    )
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('shipId', ChoiceType::class, [
                'label' => 'Ship',
                'choices' => $this->choicesValuesProvider->getMiningShips(),
                'placeholder' => 'Choice a ship',
                'autocomplete' => true,
            ])
            ->add('miningLasers', ChoiceType::class, [
                'label' => 'Mining Laser',
                'choices' => [],
            ]);

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            /** @var MiningConfigurator $data */
            $data = $event->getData();

            $shipId = $data?->getShipId();
            $this->addMiningLaserField($event->getForm(), $shipId);
        }
        );

        $builder->get('shipId')->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $shipId = $event->getForm()->getData();
            $this->addShip($event->getForm()->getParent(), $shipId);
            $this->addMiningLaserField($event->getForm()->getParent(), $shipId);
        }
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MiningConfigurator::class
        ]);
    }

    public function addShip(FormInterface $form, ?int $shipId): void
    {
        /** @var MiningConfigurator $miningConfigurator */
        $miningConfigurator = $form->getData();
        $miningConfigurator->setShip($this->shipProvider->getshipById($shipId));
    }

    public function addMiningLaserField(FormInterface $form, ?int $shipId): void
    {
        $miningLaserChoices = null === $shipId ? [] : $this->choicesValuesProvider->getMiningLasers($shipId);
        $form->add('miningLasers', ChoiceType::class, [
            'placeholder' => 'Choice a mining laser',
            'multiple' => true,
            'expanded' => true,
            'choices' => $miningLaserChoices,
            'disabled' => null === $shipId,
            'invalid_message' => false,
//            'autocomplete' => true,
        ]);
    }
}
