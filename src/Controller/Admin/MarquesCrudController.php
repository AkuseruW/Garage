<?php

namespace App\Controller\Admin;

use App\Entity\Marques;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class MarquesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Marques::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('imageName')->setBasePath('/images/marques')->onlyOnIndex(),
        ];
    }

}
