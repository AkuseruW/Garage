<?php

namespace App\Form;

use App\Entity\Voitures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoituresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modelName')
            ->add('prix')
            ->add('kilometrage')
            ->add('nbr_propi')
            ->add('puissance')
            ->add('cylindre')
            ->add('description')
            ->add('Carburant')
            ->add('date')
            ->add('slug')
            ->add('marques')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
