<?php

namespace App\Form;

use App\Entity\Marques;
use App\Entity\Voitures;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class VoituresType extends AbstractType
{

    /*********** Creation / Modification voiture form ************/
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modelName', TextType::class,[
                'attr' => ['class' => 'form-control'],
            ]
            )
            ->add('prix', MoneyType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('kilometrage', IntegerType::class,[
                'attr' => ['class' => 'form-control', 'min' => 0],
            ])
            ->add('nbr_propi', IntegerType::class, [
                'attr' => ['class' => 'form-control','min' => 0],
            ])
            ->add('puissance', IntegerType::class, [
                'attr' => ['class' => 'form-control','min' => 0],
            ])
            ->add('cylindre', ChoiceType::class, [
                'choices' => [
                    '2 cylindres' =>'2 cylindres',
                    '6 cylindres' => '6 cylindres',
                    '8 cylindres' => '8 cylindres',
                    '10 cylindres' => '10 cylindres',
                    '12 cylindres' => '12 cylindres'
                    
                ],
                'attr' => ['class' => 'form-control'],
            ])

            ->add('description', TextareaType::class, array(
                // 'config' => array(
                //     'uiColor' => '#ffffff',
                // ),
                "attr" => [
                    'class' => 'form-control',
                    
                ],
            ))
            ->add('carburant', ChoiceType::class,[
                'choices' => [
                    'Diesel' =>'Diesel',
                    'Essence' => 'Essence',
                ],
                "attr" => [
                    'class' => 'form-control',
                ],
                "label" => "Carburant"
            ])

            ->add('transmission', ChoiceType::class, [
                'choices' => [
                    'Manuel' =>'Manuel',
                    'Automatic' => 'Automatic',
                ],
                "attr" => [
                    'class' => 'form-control',
                ],
                "label" => "Transmission"
            ])

            ->add('date', DateType::class, [
                'attr' => ['class' => 'form-control'],
                'widget' => 'single_text'
            ])

            ->add('marques', EntityType::class, [
                'class' => Marques::class ,
                'attr' => ['class' => 'form-control'],
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
