<?php

namespace App\Form;

use App\Entity\Marques;
use App\Entity\Voitures;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VoituresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modelName', TextType::class,[
                'attr' => ['class' => 'form-control'],
            ]
            )
            ->add('prix', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('kilometrage', IntegerType::class,[
                'attr' => ['class' => 'form-control'],
            ])
            ->add('nbr_propi', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('puissance', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('cylindre', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])

            ->add('description', CKEditorType::class, array(
                'config' => array(
                    'uiColor' => '#ffffff',
                ),
            ))
            ->add('carburant', TextType::class,[
                'attr' => ['class' => 'form-control'],
            ])
            ->add('date', DateType::class, [
                'attr' => ['class' => 'form-control'],
                'widget' => 'single_text'
            ])
            ->add('slug', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])

            ->add('marques', EntityType::class, [
                'class' => Marques::class ,
                'attr' => ['class' => 'form-control'],
                // 'choice_attr' => function (?Marques $marques) {
                //     return $marques ? ['class' => 'category_'.strtolower($marques->getNom())] : [];
                // },
            ])

            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control mt-3'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
